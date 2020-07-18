<?php
namespace pand;

if (!defined('FRAMEWORK')) { die; }

class baseModel{

    protected $db = null;

	function __construct(\pand\Database $database){
		$this->db = $database->db;
	}

	private function buildQuery($filtros){
		if (is_string($filtros)) {
			$filtros = array('from' => $filtros);
		}

		if (empty($filtros['from'])) {
			$filtros['from'] = $this->baseDb;
		}

		if (!isset($filtros['select'])) {
			$filtros['select'] = '*';
		}else{
			if (is_array($filtros['select'])) {
				$filtros['select'] = implode(', ', $filtros['select']);
			}
		}

		$sql = "SELECT ".$filtros['select']." FROM ".$filtros['from'];

		// condiciones
		if (!empty($filtros['where'])) {
			if (is_array($filtros['where'])) {
				$filtros['where'] = implode(' AND ', $filtros['where']);
			}
			$sql .= " WHERE ".$filtros['where'];
		}

		// group
		if (!empty($filtros['group'])) {
			$sql .= " GROUP BY ".$filtros['group'];
		}

		// union
		if (!empty($filtros['union'])) {
			$sql .= " UNION ".$this->buildQuery($filtros['union']);

			$sql2 = "SELECT ";
			if (isset($filtros['campos_union'])) {
				if (is_array($filtros['campos_union'])) {
					$sql2 .= implode(', ', $filtros['campos_union']);
				}else{
					$sql2 .= $filtros['campos_union'];
				}
			}else{
				$sql2 .= '*';
			}

			$sql2 .= " FROM (".$sql.") tmp";

			if (!empty($filtros['where_union'])) {
				if (is_array($filtros['where_union'])) {
					$filtros['where_union'] = implode(' AND ', $filtros['where_union']);
				}
				$sql2 .= " WHERE ".$filtros['where_union'];
			}

			$sql = $sql2;

		}

		// having
		if(!empty($filtros['having'])){
			$sql.= " HAVING ".$filtros['having'];
		}

		// orden
		if (!empty($filtros['order'])) {
			if (is_array($filtros['order'])) {
				$filtros['order'] = implode(', ', $filtros['order']);
			}
			$sql .= " ORDER BY ".$filtros['order'];
		}

		// limite
		if (!empty($filtros['limit'])) {
			$sql .= " LIMIT ".$filtros['limit'];
		}

		return $sql;
	}

    public function escape($str){
        return $this->db->qStr($str);
    }

	public function query($sql, $insert = true){
        global $App;
		$this->last_sql = $sql;
		$this->db->execute($sql);

		if ($this->db->ErrorNo() !=  0 AND $App->debug) {
			throw new Exception($this->db->ErrorMsg());
		}

		if ($insert) {
			return $this->db->Insert_ID();;
		}else{
			return $this->db->Affected_Rows();
		}
	}

	/*
		Método base para obtener registros
		$filtros tiene que tener $tabla y opcionalmente $where = null, $order = null, $limit = null, $campos = '*'
		$where => mixed array('condicion 1', 'condicion 2') o string
		$order => mixed array('orden 1', 'orden 2') o string
		$campos => mixed array('campo 1', 'campo 2') o string
	*/
	public function get($filtros, $uno_solo = false, $debug = false){
		$sql = $this->buildQuery($filtros);

		$this->last_sql = $sql;

		if ($debug) {
			showvar($sql); die;
		}

		$res = $this->db->getArray($sql);

		if ($this->db->ErrorNo() !=  0 AND $debug) {
			showvar($sql);
			throw new Exception($this->db->ErrorMsg());
		}

		if ($uno_solo == true AND isset($res[0])) {
			$res = $res[0];
		}

		return $res;
	}


	// $id es el nombre del campo clave en la tabla ej. id_oficina
	// si ese campo existe en $aData se hace un UPDATE, sino un INSERT
	public function set($aData, $id = null, $tabla = null, $where = null){
		if (empty($aData)) { return false; }

		$id_registro = false;
		$actualizando = false;
		$sCondicion =  "";

        if($tabla == null){
            $tabla = $this->baseDb;
        }

		if(isset($aData[$id])){
			$actualizando = true;
			$id_registro = $aData[$id];
			$sConsulta = "UPDATE ".$tabla." SET ";
			$sCondicion =  " WHERE ".$id."='".$id_registro."'";
			$nId = $aData[$id];

			if ($where != null) {
				$sCondicion .= ' AND '.$where;
			}
		}else{
			$sConsulta = "INSERT INTO ".$tabla." SET ";
		}

		foreach($aData as $sIndex => $sValue){
			if ($sValue === null) {
				$sConsulta .= $sIndex."=null,";
			}else{
				$sConsulta .= $sIndex."=".$this->db->qStr($sValue).",";
			}
		}

		// auditoria
		$old_reg = null;
		$sql_auditoria = "SELECT * FROM ".$tabla." WHERE ".$id."='".$id_registro."'";
		if ($actualizando) {
			$old_reg = $this->db->getArray($sql_auditoria);
			if (!empty($old_reg)) {
				$old_reg = $old_reg[0];
			}
		}

		// actualizo o inserto
		$sConsulta = substr($sConsulta, 0, -1).$sCondicion;

		if ($tabla != 'auditoria_updates') {
			$this->last_sql = $sConsulta;
		}

		$this->db->Execute($sConsulta);

		if ($this->db->ErrorNo() !=  0) {
            showvar($sConsulta);
			throw new \Exception($this->db->ErrorMsg()." - ".$sConsulta);
		}

		// seteo el id si fue un insert
		if(!$actualizando){
			$id_registro = $this->db->Insert_ID();
			$sql_auditoria = "SELECT * FROM ".$tabla." WHERE ".$id."='".$id_registro."'";
		}

		// auditoria
		$new_reg = $this->db->getArray($sql_auditoria);
		if (!empty($new_reg)) {
			$new_reg = $new_reg[0];
		}

		// comparo valores nuevos y viejos
		if (!empty($old_reg)) {
			foreach ($new_reg as $key => $value) {
				if ($new_reg[$key] === $old_reg[$key]) {
					unset($new_reg[$key]);
					unset($old_reg[$key]);
				}
			}
		}

		// si hubo cambios
		if (!empty($new_reg)) {
            global $App;
            $user_id = @$App->user->data->id;

			$auditoria_data = array(
				"`table`" => $tabla,
				"reg_id" => $id_registro,
				"old_value" => json_encode($old_reg),
				"new_value" => json_encode($new_reg),
				"user_id" => $user_id,
				"date" => date('Y-m-d H:i:s')
			);
			self::set($auditoria_data, null, 'core_audith');
		}

		return $id_registro;
	} // function setearGenerico

    public function getListSelect($id, $name, $table, $empty_value = ''){
        $res = array();

        if (!empty($empty_value)) {
            $res[''] = $empty_value;
        }

        $data = array(
            "select" => $id.", ".$name,
            "from" => $table,
            "where" => "active = 1",
        );

        $tmp = $this->get($data);

        if (empty($tmp)) {
            return false;
        }

        foreach ($tmp as $key => $value) {
            $res[$value[$id]] = $value[$name];
        }

        return $res;
    }

}

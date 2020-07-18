<?php
namespace pand\modules\abm\models;

if (!defined('FRAMEWORK')) { die; }

class Abm extends \pand\baseModel{

	protected $baseDb = "test";

	public function __construct(\pand\Database $db){
		parent::__construct($db);
	}

    public function buildAbmListQuery($config){
		if (empty($config->campos) and empty($config->customListQuery)) {
			throw new \Exception("Debe indicar de donde sacar los datos", 1);
		}

		if (!empty($config->campos)) {
			$campos = (empty($config->campos))?'*':implode(', ', $config->campos);
			$sql = "select ".$campos." from ".$config->tabla." where active = 1";
			if (!empty($config->where)) {
				$sql .= " and ".$config->where;
			}
		}

		if (!empty($config->customListQuery)) {
			$sql = $config->customListQuery;
		}

        return $sql;
    }

	public function getAbmList($pagina, $cantidad, $sql, $count_query = null){
        global $App;

		$this->last_sql = $sql;

		$data = $this->db->getArray($sql);

		if ($this->db->ErrorNo() !=  0 AND $App->debug) {
			showvar($sql);
			showvar($this->db->ErrorMsg());
			throw new \Exception($this->db->ErrorMsg());
		}

		$this->last_sql = $sql;

		$total = 0;

		if ($count_query != null) {
			$total = $this->db->getOne($count_query);
		}else{
			$pos = strrpos($sql, 'LIMIT');
			if ($pos !== false) {
				$count_query = substr($sql, 0, $pos);
				$tot = $this->db->Execute($count_query);
				$total = $tot->RecordCount();
			}else{
				$total = $this->db->getArray('SELECT FOUND_ROWS() AS total');
				if (!empty($total)) {
					$total = $total[0]['total'];
				}
			}
		}

		if ($this->db->ErrorNo() !=  0 AND $App->debug) {
			throw new \Exception($this->db->ErrorMsg());
		}

		$desde = (($pagina-1)*$cantidad) + 1;

		// hasta
		$hasta = $desde + $cantidad;
		if ($hasta > $total) { $hasta = $total; }
		if ($desde > 0 AND $hasta != $total) { $hasta--; }

		$res = array(
  			"recordsDesde" => $desde,
  			"recordsHasta" => $hasta,
  			"recordsTotal" => $total,
  			"rpp" => $cantidad,
  			"results" => $data
  		);

		return $res;
	} // function getAbmList

} // class

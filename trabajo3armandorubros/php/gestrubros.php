<!DOCTYPE html>
<html>
<head>
	<title>Rubros</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/propio.css">
    <script src="../js/axios.js"></script>
    <script src="../js/vue.js"></script>
</head>
<body>
  <div id="app" class="container">
  	<div class="row">
     <div class="col-lg-5 col-md-8 col-sm-7 col-xs-6">
       <div class="form-group">
          <div class="titulorubro"><h1>Rubros</h1> </div>
          <div v-if="mostrarMensaje" class="mensaje"> {{mensaje}}
            <button class="cierre" @click="mostrarMensaje=false">x</button>
          </div>
        </div>

        <button class="btn btn-info" @click="altarubro=true">Ingresar rubro</button>
        <button class="btn btn-info" >Buscar rubros</button>



      <table class="table table-border">
        <thead>
            <tr class="columna_nombre">
              <th>
                Id
              </th>
              <th>
                Nombre
              </th>
              <th>
                Acciones
              </th>
            </tr>
          </thead>
        <tbody>
            <tr class="columna_nombre" v-for="(rubro,index) in rubros">
              <td>
                {{rubro.id}}
              </td>
              <td>
                {{rubro.nombre}}
              </td>
              <td>
                <button class="btn btn-primary">
                  Editar
                </button>
                <button class="btn btn-danger">
                  Eliminar
                </button>
              </td>
            </tr>


          </tbody>

      </table>


</div>
     <div class="row">
     	  <div class="contenedor" v-if="altarubro">
           <div class="VentanaModal">
            <div class="cabecera tituloventana">
              <button class="cierre btn btn-primary" @click="altarubro=false"><font color="#35586F">X</font></button>
              <h1>Ingresando Rubro</h1>
            </div>
            <div class="contenido">
               <div class="form-group campo">
                   Nombre del rubro <br>
                   <input type="text" autofocus name="nombre" id="nombre" class="form-control" v-model="rubroRegistro.nombre">
               </div>
                 <button class="btn  btn-outline-primary" @click="altarubro=false;ingresarRubros()">Ingresar Rubro</button>
                 <button class="btn btn-outline-danger" @click="altarubro=false,close">Cancelar</button>
            </div>
        </div>
      </div>
     </div>
     </div>

  </div>
</body>
<script src="../js/app.js"></script>
</html>
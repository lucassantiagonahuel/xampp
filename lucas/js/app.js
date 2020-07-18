var app=new Vue({
  el:"#app",
  data:{
    titulo:"Stock",
    articulos:[],
    rubros:[],

    articuloRegistro:[],
    mensaje:'',
    busqueda:'',
    indice:0,

    altaarticulo:false,
    bajaarticulo:false,
    editararticulo:false,
    mostrarMensaje:false,
    buscararticulo:false,
    textoBusqueda: ''

    
  },

  mounted:function(){
    this.mostrarArticulos();
    this.mostrarRubros();
  },


  methods:{


    mostrarArticulos:function(){

      let formdata=new FormData();
      formdata.append("textoBusqueda",this.textoBusqueda);
      
      axios.post("http://localhost/lucas/php/listar.php",formdata)
      .then(function(response){
        if (response.data.articulos===undefined) {
          app.articulos=[];
        } else {
          console.log(response.data.articulos);
          app.articulos=response.data.articulos;
        }
      })
    },

  mostrarRubros:function(){

      axios.get("http://localhost/lucas/php/rubros.php")
      .then(function(response){
        if (response.data.rubros===undefined) {
          app.rubros=[];
        } else {
          console.log("LISTADO RUBROS");
          console.log(response.data.rubros);
          app.rubros=response.data.rubros;
        }
      })
    },


    ingresarArticulos:function(){

      let formdata=new FormData();
      formdata.append("nombre",this.articuloRegistro.nombre);
      formdata.append("id_rubro",this.articuloRegistro.id_rubro);



      axios.post("http://localhost/lucas/php/ingresar.php",formdata)
      .then(function(response){
        app.mostrarMensaje=false;
        app.mensaje=response.data.mensaje;
  /*
        app.articulos.push({  id:response.data.ultimoId,
                              nombre:app.articuloRegistro.nombre});
  */
        app.mostrarArticulos();
      })
    },

    cargaArticulo:function(dato){
      console.log(dato);
      this.articuloRegistro=dato;
    },


    modificarArticulos:function(){
      let formdata=new FormData();
      formdata.append("id",this.articuloRegistro.id);
      formdata.append("nombre",this.articuloRegistro.nombre);
      console.log(this.articuloRegistro);
      axios.post("http://localhost/lucas/php/editar.php",formdata)
      .then(function(response){
        app.mostrarMensaje=false;
        app.mensaje=response.data.mensaje;
  /*
        app.articulos.push({  id:response.data.ultimoId,
                              nombre:app.articuloRegistro.nombre});
  */
        app.mostrarArticulos();
      })
    },

    borrarArticulos:function(){

      let formdata=new FormData();
      formdata.append("id",this.articuloRegistro.id);

      axios.post("http://localhost/lucas/php/borrar.php",formdata)
      .then(function(response){
        app.mostrarMensaje=false;
        app.mensaje=response.data.mensaje;
  /*
        app.articulos.push({  id:response.data.ultimoId,
                              nombre:app.articuloRegistro.nombre});
  */
        app.mostrarArticulos();
      })
    },


  },



})
function crearTabla() {
    let cantidadFilas= document.getElementById("cantidadFila").value
    let cantidadColumnas= document.getElementById("cantidadColumna").value
    
    let formulario= document.getElementById("formTablaMatriz")
    let tabla= document.createElement("table")
    let tblbody= document.createElement("tbody")

    for (let i = 0; i < cantidadFilas; i++) {
        let crearFila= document.createElement("tr")
        
        for (let j = 0; j < cantidadColumnas; j++) {
            let crearColumna= document.createElement("td")
            let contenido= document.createElement("input")
              crearColumna.appendChild(contenido)
              crearFila.appendChild(crearColumna)  
        }
      
      tblbody.appendChild(crearFila)
    }
   tabla.appendChild(tblbody)
   formulario.appendChild(tabla)
   tabla.setAttribute("border","2") 
}


var cantidad_filas = 2;
var cantidad_columnas = 2;

    var matrizTabla = new Array();

    function leerTabla()
    {
        for(var index_fila = 1; index_fila <= cantidad_filas; index_fila++)
        {
            var fila_leyendo = new Array();

            for(var index_columna = 1; index_columna <= cantidad_columnas; index_columna++)
            {
                fila_leyendo.push(document.getElementById("fila_"+index_fila+"columna"+index_columna).value);
            }
            
            matrizTabla.push(fila_leyendo);
        } 
        
    }
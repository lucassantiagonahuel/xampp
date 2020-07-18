/*let nombre= document.getElementById("nombre")
let telefono= document.getElementById("telefono")

function enviandoFormulario() {
   if (nombre.value===null || nombre.value==='') {
      alert("Ingrese el nombre")
   }else{
       alert('Ingresado correctamente')
   } 
   
}*/

function ContarLista() {
    let contador= document.getElementById("ListaDeTareas")
    let suma=0
    for (let i = 0;  i< contador.childNodes.length; i++) {
        if (contador.childNodes[i].nodeType==1) {
            suma ++
        }
    }
    alert(suma)
}

function buscarPrimero() {
    let elementos= document.getElementById("ListaDeTareas").firstElementChild.innerHTML
        document.getElementById("primero").innerHTML=elementos
}
function buscarSegundo() {
    let elementos= document.getElementById("ListaDeTareas").lastElementChild.innerHTML
        document.getElementById("segundo").innerHTML=elementos
}
function buscarPadre() {
    let elementos= document.getElementById("miLi").parentNode.nodeName
        document.getElementById("padre").innerHTML=elementos
}
function buscarSiguiente() {
    let elementos=document.getElementById("miLi").nextElementSibling.innerHTML
    document.getElementById("siguiente").innerHTML=elementos
}
function buscarAnterior() {
    let elementos= document.getElementById("miLi2").previousElementSibling.innerHTML
    document.getElementById("anterior").innerHTML=elementos
}
function investigarTag() {
    let elementos=document.getElementsByTagName("BUTTON")[1]
    let mostrar=elementos.childNodes[0].nodeValue
    document.getElementById("tag").innerHTML=mostrar
}

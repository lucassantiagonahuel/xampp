/*let mensaje=("Esto es un \'Texto\' entre comillas, y este entre \"comillas\" dobles")
alert(mensaje)

let pregunta=prompt("Introduzca el numero del mes")

let meses = {
1:"Enero",
2:"Febrero",
3:"Marzo",
4:"Abril",
5:"Mayo",
6:"Junio",
7:"Julio",
8:"Agosto",
9:"Septiembre",
10:"Octubre",
11:"Noviembre",
12:"Diciembre"
}
document.write('El mes elegido es : ',(meses[pregunta]), ' Y pertenece al invierno')

let elementos=[true,5,false,"hola","adios",2]

if (elementos[3]>elementos[4]) {
    document.write('El elemento mayor es : ',elementos[3])
} else {
    document.write('El elemento mayor es : ',elementos[4])
}

let resultadoverdadero= elementos[0]&&elementos[2]
let resultadofalso= elementos[0]||elementos[2]
alert(resultadoverdadero)
alert(resultadofalso)


let suma= elementos[1]+elementos[5]
document.write('EL resultado de la suma es : ',suma)
let resta= elementos[1]-elementos[5]
document.write('EL resultado de la resta es : ',resta)
let multi= elementos[1]*elementos[5]
document.write('EL resultado de la multiplicacion es : ',multi)
let divi= elementos[1]/elementos[5]
document.write('EL resultado de la division es : ',divi)
let resto= elementos[1]%elementos[5]
document.write('EL resto es : ',resto)

let numerodedivision=23
let letras= ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E','T']
let numerodni=prompt("Ingrese el numero de su Dni")
let letradni=prompt("Ingrese la letra de su Dni").toUpperCase()
let calculoresto= numerodni % numerodedivision
let calculodeposicionletra=letras[calculoresto]


if (numerodni<0 || numerodni>99999999) {
    alert("El numero ingresado no es valido")
} else if (calculodeposicionletra!=letradni) {
    alert(`Las letras no coinciden, su letra es la ${calculodeposicionletra}`)
}else{
    alert("Datos ingresado correctamente")
}
console.log(calculodeposicionletra)


let resultado=1
let numeroIngresado=prompt("Ingrese el numero a factorizar")
for (let i = 1; i <= numeroIngresado; i++) {
   
        resultado*=i
    console.log(resultado)
}
alert(`El resultado de la factorizacion es ${resultado}`)

let numeroIngresado= prompt("Ingrese el numero")
let resultado= parImpar(numeroIngresado)
alert(`El numero ingresado ${numeroIngresado} es ${resultado}`)

function parImpar(numero) {
    if ((numero%2)==0) {
        return "par"
    } else {
        return "impar"
    }
}

let textoIngresado= prompt("Ingrese texto").trim()

function verLetras(texto) {
    let resultado = `El texto ingresado : ${texto} contiene  `

    if (texto==texto.toUpperCase()) {
        resultado+= "mayusculas unicamente"
    } 
    else if (texto==texto.toLowerCase()) {
        resultado+= "minusculas unicamente"
    }
    else {
        resultado+= "mayusculas y minusculas"
    }
    return resultado
}
console.log(verLetras(textoIngresado))

let textoIngresadoPuro= prompt("Ingrese su nombre")
let textoIngresado=textoIngresadoPuro.trim().toLocaleUpperCase().replace(/ /g, "")
let textoInvertido= invertir(textoIngresado)
let iguales= true

console.log(textoIngresado)
console.log(textoInvertido)

function invertir(texto) {
    return texto.split('').reverse()
}

for (i in textoIngresado) {
    if (textoIngresado[i]==textoInvertido[i]) {
        
    } else {
        iguales=false
    }
}
if (iguales==true) {
    alert(`El texto \"${textoIngresadoPuro}\" es patinodromo`)
} else {
    alert(`El texto \"${textoIngresadoPuro}\" no es patinodromo`)
}

let textoPuro= "David el mentiroso de la montaña".toUpperCase()
let textoIngresado=textoPuro.split("")
let resultado= ""

for ( i in textoIngresado) {
    if (textoIngresado[i]=="E") {
        break;
    } else {
        resultado += textoIngresado[i]
    }
}

document.write(resultado)


let textoPuro= "David el mentiroso de la ciudad".toUpperCase()
let textoIngresado=textoPuro.split("")
let resultado= ""

for ( i in textoIngresado) {
    if (textoIngresado[i]=="E") {
        continue;
    } else {
        resultado += textoIngresado[i]
    }
}

document.write(resultado)

window.onload= function () {
    let info= document.getElementById("informacion")

    let enlaces= document.getElementsByTagName("a")
    info.innerHTML="La cantidad de enlaces es : " + enlaces.length
    info.innerHTML= "El penultimo enlace es : " +enlaces[enlaces.length-2].href
    let contador=0
    for (let i = 0; i < enlaces.length; i++) {                                                  //punto 11
       if (enlaces[i].href=="http://prueba" || enlaces[i].href == "http://prueba/") {
           contador++
       }    
    }
    info.innerHTML= "La cantidad de enlaces que contienen \"http://prueba\" son : " + contador

    let parrafos= document.getElementsByTagName("p")
    let enlacesParrafos= parrafos[2].getElementsByTagName("a")
    info.innerHTML= `La cantidad de enlaces que hay en el ${enlacesParrafos.length} er parrafo es de : ` + enlacesParrafos.length

}

function muestra() {
    let elemento=document.getElementById("adicional")
    elemento.className="visible"
    let enlace=document.getElementById("enlace")             //punto 12
    enlace.className="oculto"
}



function cargarElemento() {
    let elementoParaCargar=document.getElementById("elemento").value
    let crearFila= document.createElement("li")
    let textoFila= document.createTextNode(elementoParaCargar)       //punto13
    crearFila.appendChild(textoFila)

    let lista=document.getElementById("lista")
    lista.appendChild(crearFila)

    lista.innerHTML=lista.innerHTML
}



function resaltarTexto(elemento) {
   
    switch(elemento.className) {
      case 'prueba': elemento.className='prueba2'
        break;
      case 'prueba2': elemento.className='prueba'
        break;
    }
  }*/

  function mostrarContenido(id) {
      let elemento=document.getElementById("contenidos_"+id)
      let enlaces=document.getElementById("enlace_"+id)

      if (elemento.style.display=="" || elemento.style.display=="block") {
          elemento.style.display="none"
          enlaces.innerHTML="Mostrar contenido"                                     //punto 14
      } else {
          elemento.style.display="block"
          enlaces.innerHTML="Ocultar contenido"
      }
      
  }











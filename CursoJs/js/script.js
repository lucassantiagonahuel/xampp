/*<img src="imagenprueba.jpg" alt="imagenprueba" onmouseover="this.src='imagendeprueba2.jpg'" onmouseout="this.src='imagenprueba.jpg'"></img>//ejemplo de html para imagenes



function dilafechayhora() {
    let salida= ''
    let d= new Date()
    let mes = new Array()
        mes[0]= "Enero"
        mes[1]= "Febrero"
        mes[2]= "Marzo"
        mes[3]= "Abril"
        mes[4]= "Mayo"
        mes[5]= "Junio"
        mes[6]= "Julio"                 //fecha y hora actuales
        mes[7]= "Agosto"
        mes[8]= "Septiembre"
        mes[9]= "Octubre"                                   //esto es del html
        mes[10]= "Noviembre"
        mes[11]= "Diciembre"                               //La fecha y la hora actual es : <br>
    let m= mes[d.getMonth()]                               // <div id="div1"></div>
                                                           //<button onclick="location.reload()">Recargar</button>
        let fecha = new Date()
        salida += "<br / >Fecha : " + fecha.getDate() 
        salida += "<br / >Mes : " + m
        salida += "<br / >Año : " + fecha.getFullYear()
        salida += "<br / >Horas : " + fecha.getHours()
        salida += "<br / >Minutos : " + fecha.getMinutes()
        salida += "<br / >Segundos : " + fecha.getSeconds()
    document.getElementById("div1").innerHTML=salida
}
dilafechayhora()

function calculos() {                         //calcular numeros al azar,lo que esta en el get,ele,id va como id del div en html
    document.getElementById("div1").innerHTML=Math.floor(Math.random()*11)
}

function Persona(nombre) {

    this.nombre=nombre
    this.info= "El nombre de la persona es : " + this.nombre
    this.mostrarinfo= function (){
        document.write(this.info)
    }
}                                             //forma vieja
let persona1= new Persona('Juan')
let persona2= new Persona('Pedro')

let persona= {
    nombre: 'Juan',                        //formanueva
    apellido: 'Perez',                     // desde el boton de html con onclick:persona.mostrarinfo()
    mostrarinfo(){
    document.write(`El nombre de la persona es : ${this.nombre} y su apellido es : ${this.apellido} `)
    }, 
}
persona.saludo= function () {
    alert("hola : "+ this.nombre)
}
console.log(persona)

let gato={
    animal:'',
    nombre:'',
    mostrardatos(){
        document.write(`El animal es un : ${this.animal} y su nombre es  : ${this.nombre}`)
    },
    mostrardatos2(){
        document.write(`El animal es un : ${this.animal} y raza es  : ${this.raza}`) 
    }
}
gato.animal='Gato'                //agregar datos al objeto
gato.nombre='Angela'
console.log(gato)

let perro= Object.assign({},gato)     //clonar objeto y luego cambiarle los valores
delete perro.nombre
perro.animal='Perro'
perro.raza='Beagle'
console.log(perro)

let textoingresado= prompt('Ingrese el texto a dar vuelta')

const darvueltatexto = string => string.split('').reverse().join('')
document.write(darvueltatexto(textoingresado))

const caja = (a,b) => c => a*b*c           //funcion encapsulada,de tipo flecha
document.write(caja(1,2)(3))

let usuario = '{"nombre":"Juana","Apellido":"Viale","Abuela":"Mirtha"}'
let usuario2= JSON.parse(usuario)                                         //pasar json a string
document.write("El nombre es : " + usuario2.nombre + " su apellido " + usuario2.Apellido +" es nieta de " +usuario2.Abuela) 
let userString = "{\"name\":\"Carlos\", \"username\":\"KacosPro\"}";
let user = JSON.parse(userString);
console.log(user);

let hombre ={
        nombre: "Juan",
        apellido: "Perez",
        edad: 25,

        mostrar(){
            document.write(`El nombre es : ${this.nombre}`)     
        }
}


let men = JSON.stringify(hombre)                      //lo pasas a JSON
console.log(men)

let menpasado = JSON.parse(men)                      //Lo pasas a javascript
console.log(menpasado)

console.log(menpasado.nombre)

function alertaboton() {
    alert('Has presionado un boton')               //en el htm el boton va a tener id=miboton
}
document.getElementById("miboton").onclick=alertaboton

document.getElementById("miboton").onclick= function alertaboton() {   //lo mismo que el anterior pero mas lindo 
    alert('Has presionado un boton')
}

}
*/

let nombre='juan'
console.log(nombre)
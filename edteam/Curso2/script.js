/*const alumno={
    nombre:"Juan",
    apellido:"Gonzales",
    edad: 33,
    padre:{
        nombre:"Pepe",
        apellido:"Gonzales"
    },
    saludar(){
        document.write(`Hola mi nombre es ${this.nombre} ${this.apellido} y mi padre se llama ${this.padre.nombre}`)
    }
}
alumno.saludar()

class Usuario{
    constructor(nombre,apellido,edad,email){
        this.nombre=nombre
        this.apellido=apellido
        this.edad=edad
        this.email=email
    }
    saludar(){
      return document.write(`
        <div>
            <p>Bienvenido ${this.nombre} ${this.apellido}</p>
        </div>
    `)}
}
let prueba=new Usuario("Juan","Topo",23,"juantopo@gmail.com")
console.log(prueba.saludar())

let nom=prompt("Ingrese su nombre")
let ape=prompt("Ingrese su apellido")


class Usuario {
    constructor(nombre,apellido,edad,email){
        this.nombre=nombre
        this.apellido=apellido
        this.edad=edad
        this.email=email
    }
    saludar(){
      return document.write(`
      <div>
         <p>Bienvenido ${this.nombre} ${this.apellido}</p>
      </div>          
    `)}
}

let prueba= new Usuario(nom,ape,35,"asasa@asdads")
console.log(prueba.saludar())

class Usuario{
    constructor(nombre,apellido,edad,email){
            this.nombre=nombre
            this.apellido=apellido
            this.edad=edad
            this.email=email
    }
    saludar(){
        return document.write(`        
            <div>
                <p>Bienvenido ${this.nombre} ${this.apellido}</p>
            </div>        
        `)
    }
}

let juan=new Usuario(
    "Juan",
    "Perez",
    32,
    "juanperez@gmial.com"
)
juan.saludar()


class Profesor extends Usuario{
    constructor(nombre,apellido,edad,email,experiencia,lenguaje){
        super(nombre,apellido,edad,email)
        this.experiencia=experiencia
        this.lenguaje=lenguaje
    }
}

let pablo=new Profesor(
    "Pablo",
    "Fulanito",
    55,
    "pendorcho@gmail.com",
    30,
    "Java"
)
pablo.saludar()

class Estudiante extends Usuario{
    constructor(nombre,apellido,edad,email,activado){
        super(nombre,apellido,edad,email)
        this.activado=activado
    }
}
let lucas=new Estudiante(
    "Lucas",
    "Nahuel",
    26,
    "lucas@gmail.com",
    true
)

lucas.saludar()

class Forma{
    constructor(alto,ancho,color){
        this.alto=alto
        this.ancho=ancho
        this.color=color
    }
    implementar(){
        return document.body.innerHTML=`
            <div
                style="
                width:${this.ancho}px;
                height:${this.alto}px;
                background:${this.color}
                "
                >
            </div>`
    }

    dibujarCuadrado(){
        return document.body.innerHTML=`
            <div
                style="
                    width:${this.ancho}px;
                    height:${this.alto}px;
                    background:${this.color}
                "            
            >
            </div>        
        `
    }
}
let formaPrueba=new Forma(
    220,
    400,
    "red"
)
formaPrueba.implementar()

class Cuadrado extends Forma{
    constructor(alto,ancho,color){
        super(alto,ancho,color)
    }
}

let formaCuadrado=new Forma(
    400,
    400,
    "blue"
)
formaCuadrado.dibujarCuadrado()


class Musico {
    constructor(nombre,apellido,edad,instrumento){
        this.nombre=nombre
        this.apellido=apellido
        this.edad=edad
        this.instrumento=instrumento
    }
    bienvenida(){
        return alert(`Bienvenido ${this.nombre} ${this.apellido} tu instrumento es ${this.instrumento}`)
    }
}

class Guitarrista extends Musico{
    constructor(nombre,apellido,edad,instrumento,experiencia,marcaGuitarra){
        super(nombre,apellido,edad,instrumento)
        this.experiencia=experiencia
        this.marcaGuitarra=marcaGuitarra
    }
}
let viola=new Guitarrista(
    "Juan",
    "Perez",
    23,
    "Guitarra",
    3,
    "Fender"
)
viola.bienvenida()

class Formas{
    constructor(alto,ancho,color){
        this.alto=alto
        this.ancho=ancho
        this.color=color
    }
    dibujar(){
        return document.body.innerHTML=`
            <div
                style="
                width:${this.ancho}px; 
                height:${this.alto}px;
                background:${this.color} 
                "
            >
            </div>`
    }
}

class Circulo extends Formas{
    constructor(lado,color,radio){
        super(lado,lado,color)
        this.radio=radio
    }
    dibujarcirculo(){
        return document.body.innerHTML=`
        <div
        style="
            width:${this.ancho}px;
            height:${this.alto}px;
            background:${this.color};
            border-radius:${this.radio}%;
        ">
        </div>
        `
    }
}
let circulo1=new Circulo(200,"green",50)
circulo1.dibujarcirculo()

class Usuario{
    constructor(nombre,apellido,correo,contrasenia){
        this.nombre=nombre
        this.apellido=apellido
        this.correo=correo
        this.contrasenia=contrasenia
    }
}

let form1=document.getElementById("formulario")

form1.addEventListener("submit",e=>{
    e.preventDefault()
    let nombre=e.target.nombre.value
    let apellido=e.target.apellido.value
    let correo=e.target.correo.value
    let contrasenia=e.target.contrasenia.value

    let usuario=new Usuario(
        nombre,
        apellido,
        correo,
        contrasenia
    )
    console.log(usuario)
})*/

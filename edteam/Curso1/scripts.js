/*let edad = 4
let nombre = `Lucas tiene :
 ${edad} piernas`
 

let div = `<div class=container>
             ${nombre}
            </div>
            `
let edades = [1,2,3,4,5]
let data= {
      nombre :'Juan',
      apellido:'Perez',
      edad:90
}      
console.log(typeof edades) 
console.log(typeof data)     
document.body.innerHTML = div  
let user='Juan'
let edad = prompt('Ingresa tu edad')
alert (edad)
let age=prompt('Ingrese su edad')
let isadult= age>=18
               ? 'Eres adulto'
               : 'Eres menor'
alert(isadult)
let a
let b= a && 'Pone algo'  

let number= 12.452665532155
console.log(number.toFixed(3))

let texto = '15'
let textopasadoanumero = parseInt(texto,10)

let texto = '12.45'
let textopasadoanumero= parseFloat(texto)

console.log(Math.ceil(Math.random() * 50))

let alumno= 'Lucas Nahuel'
console.log(alumno.length)

let consulta = prompt('¿Cual es la capital de argentina?').toUpperCase().trim()
let mensaje = consulta === 'BUENOS AIRES'
                      ? 'La respuesta es correcta'
                      : '¡Respuesta equivocada! Es Buenos Aires'
    alert(mensaje)       
    let nombre = 'Lucas'             
  console.log(nombre.indexOf('a'))

let nombre= 'lucas.com'
console.log(nombre.includes('com'))  

let pagina = 'https/lucas/rock'
console.log(pagina.startsWith('https/lucas'))

let pagina = 'https/lucas/rock'
console.log(pagina.endsWith('https/lucas/rock'))

let palabras= 'Hola carola'
console.log(palabras.replace('carola','carolas'))

let palabras= 'Hola carola'
console.log(palabras.split('')[5])

let palabras= 'Hola carola'
console.log(palabras.substring(1,3))

let palabras = 'Hola carola'
console.log(palabras.substr(1,6))

let palabras= 'Hola carola'
console.log(palabras.slice(-6,-2))

let numero1= 13
let numero2= 9
let numero3=5
if (numero1>numero2) {
    console.log('El primero es mayor')    //&& es para el "Y"
} else if (numero2>numero3) {             //|| es para el "O"
    console.log('EL segundo es mayor')
} else{
    console.log('El tercero es el mayor')
}

let age= parseInt(prompt('Ingresa tu edad'),10)
let mayoredad=18
let diferencia= mayoredad-age
console.log(diferencia) 
if (age) {
    if (age>mayoredad) {
        alert('Eres mayor de edad')
    } else {
        alert(`Aun eres menor,te faltan ${diferencia} años para ser mayor`)
    }
} else {
    let age= parseInt(prompt('Ingresa tu edad,no ingrese palabras'),10)
}

let age= parseInt(prompt('Ingrese un numero del 1 al 3'))
console.log(age)
switch (age) {
    case 1:
        alert('Elegiste el 1')
        break;
    case 2:
        alert('Elegiste el 2')                           //SWITCHES
    break;
    case 3:
        alert('Elegiste el 3')
    break;
    default:
        alert('Tenes que elegir un numero del 1 al 3')
        break;
}

let capital= prompt(`
¿Cual es la capital de argentina?
A. Buenos Aires
B. Montevideo
C. Madrid
D. Paris
E. La Paz
`
).toUpperCase().trim()
console.log(capital)

switch (capital) {
    case 'A':
        alert('Respuesta correcta')
        break;
    case 'B':
        alert('Respuesta incorrecta')
        break;
    case 'C':
        alert('Respuesta incorrecta')
        break;
    case 'D':
        alert('Respuesta incorrecta')
        break;
    case 'E':
        alert('Respuesta incorrecta')
        break;            
    default:
        alert('Debes ingresar una opcion dentro de las permitidas')
        break;
}

let n=100
let contador=0
for (let i = 0; i <= n; i++) {
    if(i%7===0){                   // el "continue"mustra todo menos lo que esta en el if
    console.log(i)                //el "break" corta el ciclo cuando llega a lo que quiere
    contador++
    }   
    if(contador>=5)break
}

let contraseña='Contraseña de prueba'
let contra
let cont=0
intentos=3

while (contra!==contraseña || cont>=3) {
    
    contra= prompt(`Ingrese la contraseña,te quedan ${intentos} intentos`)
    cont++
    intentos=intentos - cont
    console.log(cont)
    if (cont>=3) {
        break;
    }
    
}
console.log(cont)
if (cont===3) {
    alert('Fallaste los 3 intentos')
}

let nombre1= prompt('Ingrese su nombre')
let sexo1= prompt(`Ingrese su sexo:
m=Masculino
f=Femenino
`).toUpperCase().trim()

let nombre2='Juan'
let nombre3='Maria'

function saludaringreso(nombre,sexo) {
 
     let saludo= sexo==='M'
                     ?'Bienvenido'
                     :'Bienvenida'
     return `${saludo} a mi blog ${nombre}`                   
}
console.log(saludaringreso(nombre1,sexo1))

let nombre1= prompt('Ingrese su nombre')
let sexo1= prompt(`Ingrese su sexo:
m=Masculino
f=Femenino
`).toUpperCase().trim()

let nombre2='Juan'
let nombre3='Maria'

const saludaringreso = (nombre = 'Visitante',sexo= 'M') => {  // visitante y m estan con predefinidos por sino ingresan nada
 
     let saludo= sexo==='M'
                     ?'Bienvenido'
                     :'Bienvenida'
     return `${saludo} a mi blog ${nombre}`                   
}
console.log(saludaringreso(nombre1,sexo1))
console.log(saludaringreso(nombre2))
console.log(saludaringreso(nombre3,'f'))

const sumar =(a,b) => a + b                     //se cambia en function por el const--funcion flecha
console.log(sumar(78,22))

const sumartodos = (...numeros) => {
    resultado=0
    for (let  i= 0;  i<numeros.length; i++) {
        resultado += numeros[i]
    }
  return resultado
}
console.log(sumartodos(1,2,3,4,5,6,7))      //console.log(resultado) es lo mismo

function sumar(x) {
    return function (y) {
        return x+y
    }
}
console.log(sumar(20)(10))

const sumar = x => y => x+y
console.log(sumar(20)(10))

const sumar = x => y => x*y

const a = sumar(2)(2)                //4
const b = sumar (3)                  //y=>4*y
console.log(sumar (a) (b(3)))     //4*9

let a= 'Hola guacho'
let nombre= 'Juan'
const saludar =(nombre,saludo) =>{
    return (saludo + ' '+ nombre)
}

setTimeout(() => {
    alert(`No te pases de vivo ${nombre}`)      //el settimeout es una funcion si nombre que se programa por tiempo
}, 3000);


console.log(saludar(nombre,a))
console.log(a)

function aumentar(){
    let numero=0
    return function() {
        numero++
     console.log(numero)
    }
}                                    //suma uno cada vuelta que llama la funcion aumentar


console.log(aumentar()())
const incrementar = (aumentar())

console.log(incrementar(aumentar()))
console.log(incrementar(aumentar()))
console.log(incrementar(aumentar()))

let usuario= {
            nombre:'Juan',
            edad:32,
            saberedad(){
                console.log(this.edad)             //el this se usa como puntero de flecha de donde estas parado
                console.log(this.nombre)             siempre se usa adentro de un arreglo
            }
}
usuario.saberedad()

let array= ["hola",true,[1,2,3,4],{}]
//console.log(array[2])
console.log(array[array.length-2])

let array=["Hola","Carola","cara","De","Cola"]
let [s0,s1,s2,s3,s4]=array
console.log(array)                                //desestructuramos el array,le ponemos lo que tiene separado en variables.
console.log([s0,s1,s2,s3,s4])

let array=[1,2,3,4,5,6]
console.log(array)

array.push(7,8)              //push agrega un elemento al final
console.log(array)

array.pop()                 //pop elimina el ultimo elemento de la lista
console.log(array)

array.unshift("Hola carola")  //unshift agrega un elemento al principo del array
console.log(array)

array.shift()                //shift elimina el primer elemento de la lista
console.log(array)

let array=["Argentina","Chile","Brasil","Peru"]
console.log(array)

array.splice(1,0,"Uruguay")     //splice agrega elementos,primero pones la posicion donde queres agregar y despues cuantos elementos
console.log(array)              //quere borrar y a lo ultimo el elemento que queres agregar

array.splice(2,1,"Colombia")
console.log(array)

array.splice(4,1)
console.log(array)

console.log(array.slice(1,3))       //slice saca en un array nuevo la cantidad de elementos que marcas entre()
console.log(array)

console.log(("Hola carola cara de cola".split('')))
console.log("Hola carola cara de cola".split('').reverse())
console.log("Hola carola cara de cola".split('').reverse().join(''))

const revertirtexto = String => String.split('').reverse().join('')

console.log(revertirtexto("Hola carola"))

let array =['A','N','B','Z']
array.sort()
console.log(array)                               //sort pone en orden los string..
array.sort().reverse()
console.log(array)                                 //aca volveria a ordenarlos pero de menor a mayor con el reverse

let array =[1,2,10,30,400,399,1000,100]
    array.sort((a,b)=>a-b)                       //para que sort ordene numero hay que pasarle un callback(funcion)como en este EJ..
    console.log(array)

const ordenarnumeros= array => array.sort((a,b) => a-b) 
let array=[1,2,10,30,400,399,1000,100]                   //hice lo mismo,pero lo defini en una funcion  

console.log(ordenarnumeros(array))

let array= [1,2,10,30,400,399,1000,100]
console.log(array.join(','))                        //lo hace string y lo separa con ,

let array2=[99,999,965,985,3,5,6]
console.log(array.concat(array2))                   //une dos arreglos armando uno nuevo con todos los datos de los dos,
array.concat(10,12,13)                            //o tambien podes pushear varios numeros,no necesariamente otro array  

let array=[1,2,10,30,400,399,1000,100]
console.log(array.indexOf(400))

const buscarindice = (array,number) => array.indexOf(number) //busca el indice del numero que le digamos
console.log(buscarindice (array,400))

console.log(array.find(array => array> 300))

const buscarprimermayor = (array) => array.find(array =>array > 300) //bsuca el primer numero mayor al que le digamos
console.log(buscarprimermayor(array))

console.log(array.findIndex(array => array>300))

const posiciondelprimermayor = (array) => array.findIndex(array => array>300) //busca el indice del primer nro mayor al q le digamos
console.log(posiciondelprimermayor(array))

let array =[1,2,3,4,1,2,3,5,6,7]
console.log([...new Set(array)])            //el new set permite eliminar los duplicados de un array con los ...

const removerduplicados = array => [...new Set(array)]

console.log(removerduplicados(array))

console.log(Math.min(...array))             //sacamos el minimos de un array con los ..
console.log(Math.max(...array))

const numerominimo = array => Math.min(...array)
console.log(numerominimo(array))

const numeromaximo = array => Math.max(...array)    //sacamos el maximos de un array con los ..
console.log(numeromaximo(array))

let compañeros = ['Juan','Pedro','Jose','Alberto']

for (let i = 0; i < compañeros.length; i++) {       //for comun
    console.log(compañeros[i])
    
}


for (let compañero of compañeros) {                //for con of,solo para elementos

    console.log(compañero)
}

compañeros.forEach((compañero,i) => {              //forecha mas completo,pones el nombre del array y lo que queres hacer
    console.log(i)
});

let numeros= [1,2,3,4,5,6]
let resultado=[]
let resultado2=[]
numeros.forEach((numero,i) => {
    resultado=numero*numero
    resultado2=i*i
    console.log(resultado)
    console.log(resultado2)
});

let compañeros = ['Juan','Pedro','Jose','Alberto']
console.log(compañeros.some(compañeros => compañeros==='Juan'))  //some,busca lo que le pidas en un array y devuelve boolean

const buscarnombre = (Array,nombre) => Array.some(Array => Array===nombre)
console.log(buscarnombre(compañeros,'Roberto'))


console.log(compañeros.every(compañeros => compañeros.includes==='H')) //every,busca lo que le pidas en un array pero todos deben cumplir esa condicion o da false


let numeros=[1,2,3,4,5,6,7,8,9]
let numerosnuevos=numeros.map(numero=> numero*numero) //map,te da un array nuevo con la operacion que le pidas
console.log(numerosnuevos)

let numerosfiltrados=numeros.filter(numero=> numero>6) //filter,filtra por lo que le pidas
console.log(numerosfiltrados)

let numerosreducidos= numeros.reduce((numeroa,numerob)=> numeroa+numerob)  //reduce,hace la operacion que le pidas,da 1 solo valor
console.log(numerosreducidos)


let perro = {
    nombre: 'Chicho',
    edad: 5,
    color: 'azul',
    vacunas:true,
    pruebas(){
        console.log(`El perro es de color ${this.color}`)   //objetos
    },
}
console.log(perro.pruebas())

let a ='Hola'
let b= 'Carola'

let saludo={
    [a+b]: 'Hola carola cara de cola'
}
 console.log(saludo)

let saludo2={
    a:a,
    b:b
} 
console.log(saludo2)
let perro = {
    nombre: 'Chicho',
    edad: 5,
    color: 'azul',
    vacunas:true    
}
delete perro.edad          //borrar un dato
console.log(perro)
perro.edad=6               //agregar un dato
console.log(perro)

let perro = {
    nombre: 'Chicho',
    edad: 5,
    color: 'azul',
    vacunas:true    
}

for (let propiedades in perro) {
    
    if (perro.hasOwnProperty(propiedades) )  //recorremos las propiedades,si las tiene las muestra
    {
   console.log(propiedades)
 
   

   let perro = {
    nombre: 'Chicho',
    edad: 5,
    color: 'azul',
    vacunas:true    
}

let perro2= Object.assign({},perro)  //se asigna asi,para partir de las propiedaes anteriores,sin modificar la anterior
perro2.orejas = 'Largas'
console.log(perro2)
console.log(perro)

let perro = {
    nombre: 'Chicho',
    edad: 5,
    color: 'azul',
    vacunas:true    
}

console.log(Object.entries(perro))  //devuelve los valores y las propiedades del array
console.log(Object.keys(perro))     //devuelve las propiedades del array
console.log(Object.values(perro))   //devuelve los valores del array

*/

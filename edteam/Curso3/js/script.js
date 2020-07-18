/*const nodeList=Array.from(document.querySelectorAll('li'))
nodeList.map(el =>{
    if (el.textContent.trim().toLocaleUpperCase()==='OBJECT') {
        el.remove()
    }
}
    )

let title=document.querySelector('h1')
console.log(title.getAttribute("id"))
title.setAttribute("id","title")
console.log(title.getAttribute("id"))
title.classList.add("container")
console.log(title.classList)


let title=document.getElementById("title")
console.log(title.textContent)
console.log(title.innerHTML)
console.log(title.outerHTML)
title.textContent=`Hola carola`
title.innerHTML=`Hola <em>carola</em>`

let divPruebas=document.getElementById("pruebas")
let nombre=document.createElement("p")
divPruebas.classList.add("container")
nombre.textContent="Lucas Nahuel"

if (divPruebas && divPruebas.querySelector("span")) {
    divPruebas.querySelector("span").appendChild(nombre)    
}

console.log(divPruebas)


let titulo=document.getElementById("titulo")

//const saludar= () => alert("Hola master")
const saludar = e=>alert(e.target.textContent)
                                                    //eventos con click
titulo.addEventListener("click",e =>{
    saludar(e)
})
document.querySelector("button").addEventListener("click",e =>{
    saludar(e)
})


const titulo=document.getElementById("titulo")
const crearMenu= e =>{
    const menu=document.createElement("div")
    menu.textContent="Soy un menu custom"
    menu.setAttribute("id","menuDePrueba")
    const menuPrevio=document.getElementById("menuDePrueba")
    if(menuPrevio) document.body.removeChild(menuPrevio)

    document.body.appendChild(menu)
                                                    //eventos click derecho
    menu.style.padding="1em"
    menu.style.background="#eee"
    menu.style.position="fixed"
    menu.style.top=`${e.pageY}px`
    menu.style.left=`${e.pageX}px`
}

document.addEventListener("contextmenu", e=>{
    crearMenu(e)
    e.preventDefault()
})*/


const input=document.getElementById("input")

input.addEventListener("keyup", e =>{
    console.log(e)
})
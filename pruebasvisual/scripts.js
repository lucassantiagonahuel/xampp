
Vue.component('inicio',{
    data: function(){
        return {nombre:"Lucas Nahuel"}
    },
    props: ['mensaje'],
    template: '#mi-plantilla'
})


new Vue({

    el:'#app',
    data: {
        message: 'Esto lo cree yo'
    }
    
})

new Vue({
    el:"#appVue",
    data: {
        lists:[
            {keep:'tarea 1',completed:true},
            {keep:'tarea 2',completed:false},
        ],
        newKeep:'',
        indice:0


    },
    
    methods: {
        addKeep: function(){
            this.lists.push({keep:this.newKeep,completed:false});
        },
        editarKeep: function(k){
            this.lists[this.indice].keep=k;
        }
    },
})
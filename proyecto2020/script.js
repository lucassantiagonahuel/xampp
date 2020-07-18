new Vue
({
    el:'#appVue',
    data:
         {
           lists:[],
           newKeep: '' ,
         indice:0,
         mostrarlist:false
         },
     methods:
           {
             addKeep: function()
              {
                 this.lists.push({keep: this.newKeep, completed: false});

              },
             editarKeep: function(edi)
              {
                this.lists[this.indice].keep=edi;
              },

            ocultarlist: function ()
              {
                if (this.mostrarlist)
              {
                this.mostrarlist=false
              }
                   else
              {
                this.mostrarlist=true
              }
           },


            }

 })



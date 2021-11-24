
function init() {

var apiEspecie= 'http://localhost/ttd4a21/public/apiEspecie';

new Vue({

    // Asignamos el TOKEN
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

	el:"#apiEspecie",

	data:{
		mensaje:'HOLA MUNDO CRUEL',
		especies:[],
	},

    // Se ejecuta automáticamente cuando la pagina se crea
	created:function(){
        this.getEspecies();
	},

    // INICIO DE methods
	methods:{
		// Obtiene el listado de todas las ESPECIES
		getEspecies:function(){
            this.$http.get(apiEspecie).then(function(j){
                this.especies=j.data;
            });
		},


		eliminarEspecie:function(id) {

         Swal.fire({
          title: 'Esta seguro de eliminar?',
          text: "No podrá deshacer cambios",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminalo!'
       }).then((result) => {
          if (result.isConfirmed) {
             // Eliminamos la especie realmente

             this.$http.delete(apiEspecie + '/' + id).then(function(j){
              this.getEspecies();  
				
			 }).catch(function(j){
				Console.log(j);
			 });

			 // Fin de eliminación 

        Swal.fire(
         'Eliminado!',
         'Tu mascota fué eliminada',
         'success'
            )
         }
      });




        
        },
        // FIN DEL metodo eliminar

        mostrarModal(){
            $('#modalEspecies').modal('show');
        }

			

	},
    //FIN DE methods

	computed:{

	},
})



} window.onload = init;
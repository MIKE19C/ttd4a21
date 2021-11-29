function init() {

var apiProducto= 'http://localhost/ttd4a21/public/apiProducto';

new Vue({
    // Asignamos el TOKEN
	http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
            }
        },

	el:"#apiVenta",

	data:{
		mensaje:'HOLA MUNDO CRUEL',
		sku:'',
    ventas:[],
    cantidades:[],
    cant:1,


	},

    // Se ejecuta automáticamente cuando la pagina se crea
	created:function(){
        
	},

    // INICIO DE methods
	methods:{
		
      buscarProducto:function(){

        if (this.sku)
        {  
        var producto = {}
          this.$http.get(apiProducto + '/' + this.sku).then(function(j){
             producto = {
                  sku:j.data.sku,
                  nombre:j.data.nombre,
                  precio:j.data.precio,
                  cantidad:1,
                  total:j.data.precio
             };

            
                 this.ventas.push(producto);
                 this.cantidades.push(1);
             this.sku='';
          });
        }
      }



	},
    //FIN DE methods

	computed:{

	},
})



} window.onload = init;
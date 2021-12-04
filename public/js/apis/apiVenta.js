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
    cantidades:[1,1,1,1,1,1,1,1,1,1],
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
                  precio:j.data.precio_venta,
                  cantidad:1,
                  total:j.data.precio_venta,
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
    totalProducto(){
        return (id)=>{
            var total=0;
            if (this.cantidad[id]!=null)
                total=this.ventas[id].precio_venta * this.cantidad[id];

                //Actualizo el total del producto en el array ventas
                this.ventas[id].total=total;
                //Actualizo la cantidad en el array ventas
                this.ventas[id].cantidad=this.cantidades[id];

            return total.toFixed(1);

        }


    },
    //Fin de TotalProducto

    subTotal(){

      var total=0;

      for (var i = this.ventas.length - 1; i >= 0; i--) {
        total=total+this.ventas[i].total;
      }

      return total.toFixed(1);
    }


	}
  //FIN DEL COMPUTED

});


} window.onload = init;
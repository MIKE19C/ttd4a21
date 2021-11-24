new Vue({
	//Especificar la zoa de actuacion de Vue
  el:"#miPagina",

// Esta seccion de VUE sirve para declarar variables
// Y constantes.
data:{
   mensaje:'HOLA MUNDO',
   nombre:'',
   género:'',
   edad:0,
   editando:0,
   indice:0,
   buscar:'',
   propietarios:[{nombre:'Gabriel',género:'Masculino',edad:25},
                 {nombre:'Lucía',género:'Femenino',edad:36},
                 {nombre:'Fernando',género:'Masculino',edad:57},
                ],

   géneros:[
                {Clave:1,nombre:'Masculino'},
                {Clave:2,nombre:'Femenino'},
                {Clave:3,nombre:'Prefiero no decirlo'},
            ],
  },

  // Este objeto permite crear funciones y/o procedimientos
  methods:{


   aumentarEdad:function(){
    
      this.edad=Number(this.edad)+1;
   },

   disminuirEdad:function(){
     this.edad=Number(this.edad)-1;
   },

   agregarPropietario:function(){

    if (this.nombre && this.género && this.edad){
       // Construimos un objeto de tipo propietario para insertar en el array
       var unPropietario={nombre:this.nombre,género:this.género,edad:this.edad};

       // Agrego un objeto propietario
       this.propietarios.push(unPropietario);
       this.limpiarHtml();

       //Enviamos el foco al primer conponente html / nombre del propietario

       this.$refs.nombre.focus();

       //Enviamos mensaje de confirmacion

       Swal.fire({
             position: 'center',
             icon: 'success',
             title: 'El propietario se guardó correctamente',
             showConfirmButton: false,
             timer: 2000
       });
    }
    else
       Swal.fire({
             position: 'center',
             icon: 'error',
             title: 'Debe capturar todos los datos',
             showConfirmButton: false,
             timer: 2000
       });



   },

   limpiarHtml:function(){
     this.nombre='';
     this.género='';
     this.edad='';
   },

   eliminarPropietario:function(pos){


       //VENTANA DE SWEET ALERT 

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
            // Eliminamos el propietario seleccionado
            this.propietarios.splice(pos,1);
        Swal.fire(
         'Eliminado!',
         'El propietario fué eliminado',
         'success'
            )
         }
      });


       // FIN DE VENTANA SWEET ALERT

   },

   editarPropietario:function(pos){
      this.nombre=this.propietarios[pos].nombre;
      this.género=this.propietarios[pos].género;
      this.edad=this.propietarios[pos].edad;
      this.editando=1;
      this.indice=pos;

   },

   cancelar:function(){
      this.limpiarHtml();
      this.editando=0;
   },

   guardarEdicion:function(){

      // Modifico los valores del array de objetos 
      this.propietarios[this.indice].nombre=this.nombre;
      this.propietarios[this.indice].género=this.género;
      this.propietarios[this.indice].edad=this.edad;

      // Limpiamos los componentes HTML

      this.limpiarHtml();

      // Indicamos que terminamos de editar, (Activando el boton Agregar/Azul)
      this.editando=0;

      Swal.fire({
             position: 'center',
             icon: 'info',
             title: 'Los cambios fueron efectuados',
             showConfirmButton: false,
             timer: 1500
        });

   },




  },
  // FIN DE methods 

  // SECCION PARA CALCULAR VALOR AUTOmATICAmENTE 
  computed:{
    numeroPropietarios:function(){
      var num=0;
      num=this.propietarios.length;
      return num;
    },

    filtroPropietarios:function(){
       return this.propietarios.filter((propietario)=>{
        return propietario.nombre.toLowerCase().match(this.buscar.toLowerCase().trim()) || 
               propietario.género.toLowerCase().match(this.buscar.toLowerCase().trim())
       });
    },
  }


});
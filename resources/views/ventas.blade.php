@extends('layouts.master')
@section('titulo','Interface de ventas')
@section('contenido')
    
<div id="apiVenta"> <!--INICIO DE VUE-->
    <div class="container"><!--INICIO DE CONTAINER-->
      <div class="row"><!--INICIO ROW-->
          <div class="col-md-4"><!--INICIO DE COL-->

          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Escriba el codigo del producto" arial-describedby="basic-addon2" v-model="sku" v-on:keyup.enter="buscarProducto()">

              <div class="input-group-append">
                   <button class="btn btn-outline-secondary" type="button" @click="buscarProducto()">Buscar</button>
              </div>

          </div>

          </div><!--FIN DE COL-->
      </div><!--FIN DE ROW-->

      <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                     <th>SKU</th>
                     <th>PRODUCTO</th>
                     <th>PRECIO</th>
                     <th>CANTIDAD</th>
                     <th>TOTAL</th>
                </thead>

                <tbody>
                    <tr v-for="(venta,index) in ventas">
                        <td>@{{venta.sku}}</td>
                        <td>@{{venta.nombre}}</td>
                        <td>@{{venta.precio}}</td>
                        <td><input type="number" v-model.number="cantidades[index]" min="1"></td>
                        <td>@{{venta.total}}</td>

                    </tr>
                </tbody>
            </table>
            @{{cantidades}}
        </div>
      </div>
        
    </div><!--FIN DE CONTAINER-->

</div><!--FIN DE VUE-->  

@endsection

@push('scripts')
    <script type="text/javascript" src="js/vue-resource.js"></script>
    <script type="text/javascript" src="js/apis/apiVenta.js"></script>
@endpush



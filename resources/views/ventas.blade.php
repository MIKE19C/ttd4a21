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

      <div class="card">
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                             <th style="background: #ffff66">SKU</th>
                             <th style="background: #ffff66">PRODUCTO</th>
                             <th style="background: #ffff66">PRECIO</th>
                             <th style="background: #ffff66">CANTIDAD</th>
                             <th style="background: #ffff66">TOTAL</th>
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
              <!--FIN DEL ROW -->
        </div>   
        <!--FIN DEL CARD BODY--> 
</div>       
<!--FIN DEL CARD--> 

<div class="row">
  <div class="col-md-8"></div>

      <div class="card">
          <div class="card-body">
             <div class="col-md-4">
                  <table class="table table-bordered table-condensed">
                    <tr>
                         <th style="background: #ffff66">Subtotal</th>
                         <td>$ SUBTOTAL</td>
                    </tr>

                    <tr>
                        <th style="background: #ffff66">IVA</th>
                        <td>$ IVA</td>
                    </tr>

                    <tr>
                      <th style="background: #ffff66">TOTAL</th>
                      <td>$ SUMATOTAL
                    </tr>
              
                  </table>
             </div>
          </div>
        </div>

    </div><!--FIN DE CONTAINER-->
</div>
</div><!--FIN DE VUE-->  

@endsection

@push('scripts')
    <script type="text/javascript" src="js/vue-resource.js"></script>
    <script type="text/javascript" src="js/apis/apiVenta.js"></script>
@endpush



@extends('../layouts.frontend')
@section('title','Home')
@section('content')
<div class="container">
    <h1>Ejemplo realtime BD</h1>
    <div class="row">
        <div class="table-responsive">
            <table id="tabla" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mensaje</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($datos as $dato)
                      <tr>
                        <td>{{$dato->id}}</td>
                        <td>{{$dato->mensaje}}</td>
                        <td>{{$dato->estado}}</td>
                        <td>{{$dato->fecha}}</td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         
        <strong class="me-auto"><i class="fas fa-check"></i> Nuevo mensaje</strong>
        <!--<small>11 mins ago</small>-->
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body" id="mensaje_toast">
       
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script module>




     

        var tbodyRef = document.getElementById('tabla').getElementsByTagName('tbody')[0];
  
      document.addEventListener('DOMContentLoaded', function () {
       
        Echo.channel('mi_canal_bd')
            .listen('EventoBaseDeDatosEvent', (e) => {
                //agrego una nueva columna a la tabla
                var newRow = tbodyRef.insertRow(0);

                var newCell0 = newRow.insertCell(0);
                var newText0 = document.createTextNode(e.datos.id);
               
                var newCell1 = newRow.insertCell(1);
                var newText1 = document.createTextNode(e.datos.mensaje);

                var newCell2 = newRow.insertCell(2);
                var newText2 = document.createTextNode(e.datos.estado);

                var newCell3 = newRow.insertCell(3);
                var newText3 = document.createTextNode(e.datos.fecha);
                
                newCell0.appendChild(newText0);
                newCell1.appendChild(newText1);
                newCell2.appendChild(newText2);
                newCell3.appendChild(newText3);

                //toast bootstrap
                var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                document.getElementById('mensaje_toast').innerHTML=e.datos.mensaje;
                var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl) 
                });
                toastList.forEach(toast => toast.show()); 
                
            });
    });
     
   
</script>
@endpush
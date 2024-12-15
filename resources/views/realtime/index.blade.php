@extends('../layouts.frontend')
@section('title','Home')
@section('content')
<div class="container">
    <h1>Esperando noticias</h1>
    <div class="row">
        <div class="table-responsive">
            <table id="tabla" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>

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
        Hello, world! This is a toast message.
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script module>




     

        var tbodyRef = document.getElementById('tabla').getElementsByTagName('tbody')[0];
  
      document.addEventListener('DOMContentLoaded', function () {
       
        Echo.channel(`mi_canal`)
            .listen('EjemploEvent', (e) => {
                //agrego una nueva columna a la tabla
                var newRow = tbodyRef.insertRow(0);
                var newCell = newRow.insertCell();
                var newText = document.createTextNode(e.message);
                newCell.appendChild(newText);

                //toast bootstrap
                var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                document.getElementById('mensaje_toast').innerHTML=e.message;
                var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl) 
                });
                toastList.forEach(toast => toast.show()); 
                //console log del evento de laravel
                //console.log(e.message);
            });
    });
    /*
    document.addEventListener('DOMContentLoaded', function () {
       
        Echo.channel(`mi_canal`)
            .listen('EjemploEvent', (e) => {
                
 //console log del evento de laravel
                console.log(e.message);
            });
    });
    */
   
</script>
@endpush
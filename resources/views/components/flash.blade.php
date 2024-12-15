@if(Session::has('mensaje')) 
<div class="alert alert-{{Session::get('css')}}   border-0 alert-dismissible fade show" role="alert">
   
        {{ Session::get('mensaje') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Cerrar"></button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger   border-0 alert-dismissible fade show" role="alert">
<ul>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" title="Cerrar"></button>
</div>
@endif
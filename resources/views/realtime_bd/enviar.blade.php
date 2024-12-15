@extends('../layouts.frontend')
@section('title','Home')
@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3s">
                Crear mensaje
            </div>
            <div class="card-body">
                <x-flash />
                <form method="post" action="{{route('realtime_bd_enviar_post')}}">
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-2 col-form-label label-class">Nombre</label>
                        <div class="col-sm-10">
                            <textarea name="mensaje" id="mensaje" class="form-control">{{old('mensaje')}}</textarea>
                        </div>
                    </div>
                    <hr />
                    {{ csrf_field() }}
                    <button class="btn btn-primary" title="Enviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
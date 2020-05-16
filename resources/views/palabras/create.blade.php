@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Palabras
    </div>
    <form action="{{ route('palabras.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <div class="form-group col-md">
                    <label for="palabra" class=" col-form-label text-md-right">Palabra (*)</label>
                    <input id="palabra" type="text" class="form-control  @error('palabra') is-invalid @enderror"
                        name="palabra" value="{{ old('palabra') }}" placeholder="Ingrese la palabra" required>
                    @error('palabra')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md">
                    <label for="pronunciacion" class=" col-form-label text-md-right">Pronunciacion (*)</label>
                    <input id="pronunciacion" type="text"
                        class="form-control  @error('pronunciacion') is-invalid @enderror" name="pronunciacion"
                        value="{{ old('pronunciacion') }}" placeholder="Ingrese la pronunciacion" required>
                    @error('pronunciacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md">
                    <label for="traduccion_espanol" class=" col-form-label text-md-right">Traduccion en español
                        (*)</label>
                    <input id="traduccion_espanol" type="text"
                        class="form-control  @error('traduccion_espanol') is-invalid @enderror"
                        name="traduccion_espanol" value="{{ old('traduccion_espanol') }}"
                        placeholder="Ingrese la traduccion en español" required>
                    @error('traduccion_espanol')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md">
                    <label for="modulo" class=" col-form-label text-md-right">Modulos (*)</label>
                    <select name="modulo" id="modulo" class="form-control" required>
                        <option value="" selected disabled>--Seleccione--</option>
                        @foreach ($modulos as $modulo)
                        @if (!is_null($temaUsado))
                        @if ($temaUsado->modulo_id == $modulo->id )
                        <option value="{{$modulo->id}}" selected>{{$modulo->nombre}}</option>
                        @else
                        <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                        @endif

                        @else
                        <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                        @endif

                        @endforeach
                    </select>

                    @error('modulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <div class="form-group col-md">
                    <label for="tema" class=" col-form-label text-md-right">Temas (*)</label>
                    <select name="tema" id="tema" class="form-control" required>

                        <option value="" selected disabled>--Seleccione--</option>
                    </select>

                    @error('tema')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="form-group col-md">
                    <label for="ejemplo_ingles" class=" col-form-label text-md-right">Ejemplo en Ingles</label>
                    <input id="ejemplo_ingles" type="text"
                        class="form-control  @error('ejemplo_ingles') is-invalid @enderror" name="ejemplo_ingles"
                        value="{{ old('ejemplo_ingles') }}" placeholder="Ingrese el ejemplo en ingles">
                    @error('ejemplo_ingles')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group col-md">
                    <label for="traduccion_ejemplo" class=" col-form-label text-md-right">Ejemplo español</label>
                    <input id="traduccion_ejemplo" type="text"
                        class="form-control  @error('traduccion_ejemplo') is-invalid @enderror"
                        name="traduccion_ejemplo" value="{{ old('traduccion_ejemplo') }}"
                        placeholder="Ingrese el ejemplo traducido">
                    @error('traduccion_ejemplo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group col">
                    <label for="nota" class=" col-form-label text-md-right">Notas </label>
                    <textarea name="nota" id="nota" cols="30" rows="1"
                        class="form-control  @error('nota') is-invalid @enderror"
                        placeholder="Ingrese informacion extra">{{ old('nota') }}

                </textarea>
                    @error('nota')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>


        </div>

        <div class="card-footer float">
            <div class="float-right">
                <a href="" class="btn btn-dark"><i class="fal fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fal fa-check"></i> Guardar</button>
            </div>
        </div>

    </form>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        cargarTemas();
      });
    $('#modulo option').click(function () {
        cargarTemas();  
    });

   
      function cargarTemas() {
        var id_ = $('#modulo').val() ;
        var url = "{{ route('palabras.getTemas' , ':id') }}" ;
        url = url.replace(':id' , id_) ;
        var html = '';
        //AJAX
        $.get(url ,function(data){
            
            var html_select = '<option value="" selected disabled>--Seleccione--</option>' ;
            var temaSeleccionado= parseInt("{{$temaUsado->id ?? null}}");   
            if(data['disponible']){
                for (var i = 0; i < data['temas'].length; i++) {
                    if(data['temas'][i].id == temaSeleccionado){
                        html_select += '<option value="'+data['temas'][i].id+'" selected>'+data['temas'][i].nombre+'</option>' ;
                    }else{
                        html_select += '<option value="'+data['temas'][i].id+'">'+data['temas'][i].nombre+'</option>' ;

                    }
                }
                $('#tema').html(html_select);
                }else{
                
                    $('#tema').html(html_select);
                    alert('El modelo seleccionado no tiene temas asociados');

                }
        });
      }

</script>
@endpush
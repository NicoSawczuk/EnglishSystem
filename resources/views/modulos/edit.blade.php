@extends('layouts.app')

@section('content')
<form class="form-group" method="POST" action="{{route("modulos.update", $modulo->id)}}">
    @method('PUT')
    <div class="card">
        <div class="card-header">
            Edicion del Modulo {{$modulo->nombre}}
        </div>
        <div class="card-body">
            <div class="form-group ">
                <label for="nombre">Nombre del Modulo</label>
                <input type="text" class="form-control  @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') ?? $modulo->nombre }}"
                    placeholder="Especifique el nombre del modulo a crear" required>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group ">
                <label for="nombre">Descripcion del Modulo</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"
                    placeholder="Ingrese una breve descripcion del modulo" required>{{ old('descripcion') ?? $modulo->descripcion }}</textarea>

            </div>
        </div>
        <div class="card-footer float">
            <div class="float-right">
                <a href="" class="btn btn-dark"><i class="fal fa-times"></i> Cancelar </a>
                <button type="submit" class="btn btn-primary "><i class="fal fa-check"></i> Guardar</button>
            </div>
        </div>
    </div>
    @csrf
</form>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Editar {{$tema->nombre}}
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('temas.update', $tema->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="form-group col-md-3">
                    <label for="nombre" class=" col-form-label text-md-right">Nombre</label>
                    <input id="nombre" type="text" class="form-control  @error('nombre') is-invalid @enderror"
                        name="nombre" value="{{ old('nombre') ?? $tema->nombre }}" placeholder="Ingrese el nombre" required>
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-5">
                    <label for="descripcion" class=" col-form-label text-md-right">Descripción</label>
                    <textarea id="descripcion" class="form-control  @error('descripcion') is-invalid @enderror" rows="3"
                        name="descripcion" value="{{ $tema->descripcion }}" placeholder="Ingrese la descripción"
                        required>{{ $tema->descripcion }}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-5">
                    <label for="modulo" class=" col-form-label text-md-right">Módulo</label>
                    <select class="form-control  @error('modulo') is-invalid @enderror" rows="3" name="modulo"
                        value="{{ old('modulo') }}"> 
                        @foreach ($modulos as $modulo)
                            @if ($tema->modulo_id == $modulo->id)
                                <option value="{{$modulo->id}}" selected>{{ $modulo->nombre }}</option>
                            @else
                                <option value="{{$modulo->id}}">{{ $modulo->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('modulo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
    </div>
    <div class="card-footer float">
        <div class="float-right">
            <a href="{{route('temas.index')}}" class="btn btn-dark"><i class="fal fa-times"></i> Cancelar </a>
            <button type="submit" class="btn btn-primary "><i class="fal fa-check"></i> Guardar</button>
        </div>
    </div>
    </form>
</div>
@endsection
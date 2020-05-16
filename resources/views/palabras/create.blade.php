@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Modulos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('modulos.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label for="palabra" class=" col-form-label text-md-right">Palabra (*)</label>
                <input id="palabra" type="text" class="form-control  @error('palabra') is-invalid @enderror"
                    name="palabra" value="{{ old('palabra') }}" placeholder="Ingrese la palabra" required>
                @error('palabra')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="pronunciacion" class=" col-form-label text-md-right">Pronunciacion (*)</label>
                <input id="pronunciacion" type="text" class="form-control  @error('pronunciacion') is-invalid @enderror"
                    name="pronunciacion" value="{{ old('pronunciacion') }}" placeholder="Ingrese la pronunciacion"
                    required>
                @error('pronunciacion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="traduccion_espanol" class=" col-form-label text-md-right">Traduccion en español (*)</label>
                <input id="traduccion_espanol" type="text"
                    class="form-control  @error('traduccion_espanol') is-invalid @enderror" name="traduccion_espanol"
                    value="{{ old('traduccion_espanol') }}" placeholder="Ingrese la traduccion en español" required>
                @error('traduccion_espanol')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


        </div>
        <div class="form-group row">
            <div class="form-group col-md-3">
                <label for="ejemplo_ingles" class=" col-form-label text-md-right">Ejemplo en Ingles</label>
                <input id="ejemplo_ingles" type="text"
                    class="form-control  @error('ejemplo_ingles') is-invalid @enderror" name="ejemplo_ingles"
                    value="{{ old('ejemplo_ingles') }}" placeholder="Ingrese el ejemplo en ingles" required>
                @error('ejemplo_ingles')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="traduccion_ejemplo" class=" col-form-label text-md-right">Ejemplo español</label>
                <input id="traduccion_ejemplo" type="text"
                    class="form-control  @error('traduccion_ejemplo') is-invalid @enderror" name="traduccion_ejemplo"
                    value="{{ old('traduccion_ejemplo') }}" placeholder="Ingrese el ejemplo traducido" required>
                @error('traduccion_ejemplo')
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
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Modulos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('modulos.create')}}">Nuevo</a>
    </div>
    <div class="card-body">

    </div>
    <div class="card-footer float">
        <div class="float-right">
            <a href="" class="btn btn-dark"><i class="fal fa-times"></i> Cancelar </a>
            <button type="submit" class="btn btn-primary "><i class="fal fa-check"></i> Guardar</button>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Modulos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('modulos.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th " class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modulos as $modulo)
                <tr>
                    <td>{{$modulo->id}}</td>
                    <td>{{$modulo->nombre}}</td>
                    <td width="30%">{{$modulo->descripcion}}</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" >Editar</a>
                        {{-- href="{{route('modulos.edit', )}}" --}}
                        <a class="btn btn-danger btn-sm text-white" >Borrar</a>
                        {{-- href="{{route('modulos.delete')}}" --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

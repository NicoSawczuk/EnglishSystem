@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Modulos
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('modulos.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" >Editar</a>
                        {{-- href="{{route('modulos.edit', )}}" --}}
                        <a class="btn btn-danger btn-sm text-white" >Borrar</a>
                        {{-- href="{{route('modulos.delete')}}" --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

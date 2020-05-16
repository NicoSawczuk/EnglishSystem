@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Temas
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('temas.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th>Módulo</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($temas as $tema)
                <tr>
                    <td>{{$tema->nombre}}</td>
                    <td>{{$tema->descripcion}}</td>
                    <td>{{$tema->modulo->nombre}}</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" href="{{route('temas.edit', $tema->id)}}">Editar</a>
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
@push('scripts')
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@endpush
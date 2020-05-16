@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Modulos</div>
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
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

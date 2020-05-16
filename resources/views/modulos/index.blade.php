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
                    <th class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modulos as $modulo)
                <tr>
                    <td>{{$modulo->id}}</td>
                    <td>{{$modulo->nombre}}</td>
                    <td width="30%">{{$modulo->descripcion}}</td>
                    <td width="15%" class="text-right">
                        <a class="btn btn-light btn-sm" href="{{route('modulos.edit',$modulo->id)}}">Editar</a>
                        {{-- --}}
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$modulo->id}} >Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div id="confirmDelete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmacion</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">¿Esta seguro que desea borrarlo?</h4>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- Paso el id de la materia  aborrar en materia_delete--}}
                    <button type="submit" name="ok_delete" id="ok_delete" class="btn btn-danger">SI Borrar</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">NO Borrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('modulos.delete',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush

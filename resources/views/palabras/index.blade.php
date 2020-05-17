@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Palabras
        <a class="btn btn-primary btn-sm float-right text-white" href="{{route('palabras.create')}}">Nuevo</a>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-striped table-bordered dataTable">
            <thead>
                <tr>
                    <th scope="col">Palabra</th>
                    <th scope="col">Pronunciacion</th>
                    <th scope="col">Español</th>
                    <th scope="col">Ejemplo</th>
                    <th scope="col">Ejemplo Español</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Tema</th>
                    <th scope="col" class="text-right">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($palabras as $palabra)
                <tr>


                    <td>{{$palabra->palabra}}</td>
                    <td>{{$palabra->pronunciacion}}</td>
                    <td>{{$palabra->traduccion_espanol}}</td>
                    <td>{{$palabra->ejemplo_ingles}}</td>
                    <td>{{$palabra->traduccion_ejemplo}}</td>
                    <td>{{$palabra->nota}}</td>
                    <td>{{$palabra->tema->nombre}}</td>
                    <td class="text-right">
                        <a class="btn btn-light btn-sm" href="{{ route('palabras.edit', $palabra->id) }}">Editar</a>
                        <a class="btn btn-danger btn-sm text-white delete" val-palabra={{$palabra->id}}>Borrar</a>
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

    url2="{{route('palabras.delete',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
</script>
@endpush
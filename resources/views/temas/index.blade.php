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
                        <a class="btn btn-danger btn-sm text-white delete"  val-palabra={{$tema->id}} >Borrar</a>
                        {{-- href="{{route('modulos.delete')}}" --}}
                    </td>
                    
                </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>

<br>

<center>
    <section class="container-palabra">
        <div id="card-palabra">
            <figure class="front">1</figure>
            <figure class="back">2</figure>
          </div>
    </section>

    <button id="verPalabra" class="btn btn-dark">Ver</button>
    <button id="siguiente" class="btn btn-primary">Siguiente </button>
</center>

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
                <button type="button" class="btn btn-default" data-dismiss="modal" >NO Borrar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .container-palabra {
  width: 200px;
  height: 200px;
  position: relative;
  perspective: 800px;
  margin-bottom: 10px;
}

 #card-palabra {
  width: 200px;
  height: 200px;
  position: absolute;
  transform-style: preserve-3d;
  transition: transform 1s;

}

#card-palabra figure {
  margin: 0;
  display: block;
  position: absolute;
  width: 200px;
  height: 200px;
  backface-visibility: hidden;
}

#card-palabra .front {
    border-radius: .3em;
  margin: 0;
    padding: 0;
    background: #333;
    display: flex;
    justify-content: center;
    align-items: center;   
    font-family: sans-serif;
    background-color: rgb(247, 254, 255, 0.9); 
    box-shadow: 0 5px 10px rgba(61,61,61,0.8);
}

#card-palabra .back {
  border-radius: .3em;
  margin: 0;
    padding: 0;
    background: #333;
    display: flex;
    justify-content: center;
    align-items: center;   
    font-family: sans-serif;
    background-color: rgba(255, 210, 158, 0.4); 
    box-shadow: 0 5px 10px rgba(61,61,61,0.8);
  transform: rotateY( 180deg);
}

#card-palabra.flipped {
  transform: rotateY( 180deg);
}
</style>

@endsection

@push('scripts')
<script>
    $('#verPalabra').click(function(){
        $("#card-palabra").toggleClass("flipped");
    })
</script>

<script>
    $(document).on('click', '.delete', function(){
    id = $(this).attr('val-palabra');

    url2="{{route('temas.delete',":id")}}";
    url2=url2.replace(':id',id);

    $('#formDelete').attr('action',url2);
    $('#confirmDelete').modal('show');
    });

    $('#formDelete').on('submit',function(){
    $('#ok_delete').text('Eliminando...')
    });
    
</script>
@endpush
@extends('layouts.app')

@section('content')
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
        box-shadow: 0 5px 10px rgba(61, 61, 61, 0.8);
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
        box-shadow: 0 5px 10px rgba(61, 61, 61, 0.8);
        transform: rotateY(180deg);
    }

    #card-palabra.flipped {
        transform: rotateY(180deg);
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">Comienza a practicar</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="form-group row">
                <div class="form-group col-md-3">
                    <label for="modulo" class="col-form-label text-md-right">Módulos</label>
                    <select class="form-control" rows="3" id="selectModulos">
                        @foreach ($modulos as $modulo)
                        <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="modulo" class="col-form-label text-md-right">Temas</label>
                    <select class="form-control" rows="3" id="selectTemas">

                    </select>
                </div>
                <div class="form-group col-md-3">
                    <p style="margin-top: 50px;">
                        <div class="custom-control custom-switch">
                            {{-- Value 1 es en ingles, Value 0 es en español --}}
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" checked>
                            <label class="custom-control-label" for="customSwitch1">Practicar en inglés</label>
                        </div>
                    </p>
                </div>
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
        <br>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('#verPalabra').click(function(){
        $("#card-palabra").toggleClass("flipped");
    })
</script>
<script>
    $('#selectTemas').change(function(){
        var idTema = $('#selectTemas').val();
        $.ajax({
            url:"/home/ajax_practica_temas",
            method:"GET",
            dataType: 'json',
            data:{idTema:idTema,},
            success:function(result)
            {
                console.log(result);
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        var idModulo = $('#selectModulos').val();
        $.ajax({
            url:"/home/ajax_practica",
            method:"GET",
            dataType: 'json',
            data:{idModulo:idModulo,},
            success:function(result)
            {
                $('#selectTemas').html('');
                result.forEach(element => {
                    $("#selectTemas").append('<option value="'+element[0]+'">'+element[1]+'</option>');
                });

            }
        })
    })
</script>
<script>
    $('#selectModulos').change(function(){
            var idModulo = $('#selectModulos').val();
            $.ajax({
                url:"/home/ajax_practica",
                method:"GET",
                dataType: 'json',
                data:{idModulo:idModulo,},
                success:function(result)
                {
                    $('#selectTemas').html('');
                    result.forEach(element => {
                        $("#selectTemas").append('<option value="'+element[0]+'">'+element[1]+'</option>');
                    });

                }
            })
        })
</script>
@endpush
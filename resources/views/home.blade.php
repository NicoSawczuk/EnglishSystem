@extends('layouts.app')

@section('content')
<style>
    .container-palabra {
        width: 315px;
        height: 315px;
        position: relative;
        perspective: 800px;
        margin-bottom: 10px;
    }

    #card-palabra {
        width: 315px;
        height: 315px;
        position: absolute;
        transform-style: preserve-3d;
        transition: transform 1s;

    }

    #card-palabra figure {
        margin: 0;
        display: block;
        position: absolute;
        width: 315px;
        height: 315px;
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
        font-family: Lucida Sans;
        background-color: rgb(247, 254, 255, 0.9);
        box-shadow: 0 5px 10px rgba(61, 61, 61, 0.8);
    }

    #card-palabra .back {
        border-radius: .3em;
        margin: 0;
        padding: 0;
        background: #333;
        display: block;
        justify-content: left;
        align-items: left;
        font-family: Lucida Sans;
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
                    <select class="select2" multiple="multiple" data-placeholder="Seleccione un tema"
                        style="width: 100%;" id="selectTemas" onchange="siguiente()" disabled>

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
                    <figure class="front"></figure>
                    <figure class="back"></figure>
                </div>
            </section>
            <div class="ds"></div>

            <button id="verPalabra" class="btn btn-dark">Ver</button>
            <button id="siguiente" class="btn btn-primary" onclick="siguiente()" disabled>Siguiente </button>
        </center>
        <br>
    </div>
</div>
<div id="modalNotas" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Notas</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;" id="bodyNotas"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
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
    function siguiente(){
        var idTema = $('#selectTemas').val();
        $('#siguiente').removeAttr('disabled');
        $.ajax({
            url:"/home/ajax_practica_temas",
            method:"GET",
            dataType: 'json',
            data:{idTema:idTema,},
            success:function(result)
            {
                if (result != 0){
                    if ($('#customSwitch1').is(':checked')){
                    // Escribimos el atributo palabra adelante
                    $('.front').html('<h3>'+result['palabra']+'</h3>');
                    $('.back').html(''+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px; font-size: 16px;"><b>Traducción al español:</b> '+result['traduccion_espanol']+'</p>'+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px; font-size: 16px;"><b>Pronunciación:</b> '+result['pronunciacion']+'</p>'+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px; font-size: 16px;"><b>Ejemplos:</b> <br>'+result['ejemplo_ingles']+'<br>'+result['traduccion_ejemplo']+'</p>'+
                                    '<a class="btn btn-secondary btn-sm text-white verNotas" val-palabra="'+result['id']+'">Ver notas</a>'
                    +'');
                    $('#bodyNotas').html(result['nota']);
                }else{
                    // Escribimos el atributo traduccion_espanol adelante
                    $('.front').html('<h3>'+result['traduccion_espanol']+'</h3>');
                    $('.back').html(''+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px;  font-size: 16px;"><b>Traducción al ingles:</b> '+result['palabra']+'</p>'+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px;  font-size: 16px;"><b>Pronunciación:</b> '+result['pronunciacion']+'</p>'+
                                    '<p class="text-left" style="margin-left: 10px; margin-top: 10px;  font-size: 16px;"><b>Ejemplos:</b> <br>'+result['traduccion_ejemplo']+'<br>'+result['ejemplo_ingles']+'</p>'+
                                    '<a class="btn btn-secondary btn-sm text-white verNotas" val-palabra="'+result['id']+'">Ver notas</a>'
                    +'');
                    $('#bodyNotas').html(result['nota']);
                }
            }
            }
        })
    };
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
                $('#selectTemas').removeAttr('disabled');

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
                    $('#selectTemas').removeAttr('disabled');
                }
            })
        })
</script>
<script>
    $(function () {
        $('.select2').select2()
        });

</script>
<script>
    $(document).on('click', '.verNotas', function(){
    id = $(this).attr('val-palabra');


    $('#modalNotas').modal('show');
    });


</script>
@endpush
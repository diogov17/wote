@extends('frontend.template.templateSemSlider')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')
    <head>
        <script>
          function submitmessage() {
                $('input#mensagem').val($('textarea#usermsg').val());
                //document.write($('input#mensagem').val());
                $('form#messageform').submit();
          }
        </script>
    <head/>

    <body>
        <div class="container">

            <div id="wrapper">
                <div id="menu">
                    <br><br>
                    <h2 text-align="center" class="welcome">A trocar mensagens com {{$nomes[$id2]->name}}</h2>
                    <br>
                    <?php $tipo = strtolower($perfil2->descricaoTipoConta) ?>
                    <p class="logout"><a id="exit" href="{{ URL::to($tipo, ['id' => $perfil2->idUtilizador]) }}">Voltar ao Perfil de {{$nomes[$id2]->name}}</a></p>
                    <div style="clear:both"></div>
                </div>

                <div id="chatbox"></div> 
                    <textarea name="ch" type="text" id="ch" rows="15" cols="70" readonly style= "margin: 0 auto;float: none;">
                        @foreach ($emails as $m)
                            {{$m->dataHoraCriacao}} ({{$nomes[$m->idRemetente]->name}}): {{$m->mensagem}}
                        @endforeach
                    </textarea>
                    <br/>
                    <textarea name="usermsg" type="text" id="usermsg" placeholder="Escreva aqui a sua mensagem" rows="5" cols="70" autofocus autocomplete="off">
                    </textarea>
                    <br/>
                    <button type="button" onclick="submitmessage()" name="submitmsg" id="submitmsg">Enviar Mensagem</button>
                <form name="messageform" id="messageform" action="{{ URL::to('enviar', ['id' => $perfil1->idUtilizador, 'id2' => $perfil2->idUtilizador]) }}" method="post" enctype="multipart/form-data">
                    <input name="mensagem" type="hidden" id="mensagem" value="Default" >
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" >
                </form>
                <br><br>

                <script>
                    function getMsg() {
                        return document.getElementById("usermsg").value;
                    }
                </script>
            </div>
        </div>


    </body>


    @stop

    @section('scriptsFooter')


@stop
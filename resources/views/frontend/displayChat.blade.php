@extends('frontend.template.templateSemSlider')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')


<body>
   <div id="container">

    <div id="wrapper">
        <div id="menu">
            <p class="welcome">A trocar mensagens com {{$artista->name}}<b></b></p>
            <p class="logout"><a id="exit" href="/artista/"{{$perfil1->idUtilizador}}>Voltar ao Perfil de {{$artista->name}}</a></p>
            <div style="clear:both"></div>
        </div>

        <div id="chatbox"></div>
        <form name="message" action="#">
            <textarea name="usermsg" type="text" id="usermsg" rows="15" cols="70" readonly style= "margin: 0 auto;float: none;">
                @foreach ($emails as $m)
    				<br>{{$m->dataHoraCriacao}} {{$m->idRemetente}}: {{$m->mensagem}}</br>
				@endforeach
			</textarea>
            <br />
            <textarea name="usermsg" type="text" id="usermsg" placeholder="Escreva aqui a sua mensagem" rows="5" cols="70" autofocus autocomplete="off"></textarea>
            <br />
            <input name="Enviar Mensagem" type="submit" id="submitmsg" value="Enviar Mensagem" />
        </form>
    </div>
    </div>
    <script>
		function msg($a){

		$nemails = new Emails();
		$nemails.idEmail           = 1;
		$nemails.idRemetente       = 1;
		$nemails.idDestinatario    = 1;
		$nemails.idPasta           = 1;
		$nemails.dataHoraCriacao   = 1;
		$nemails.visto             = 1;
		$nemails.mensagem          = $a;
		$nemails.idPedidoOrcamento = 0;
		$nemails.idEmailResposta   = 0;
		}
    </script>


</body>


@stop

@section('scriptsFooter')


@stop
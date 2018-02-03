<?php


?>

<!DOCTYPE html>
<html lang="pt-PT">


<head>


@include('frontend.template.header')

</head>


<body>

    <?php
        date_default_timezone_set('Europe/Lisbon');
        if(Auth::user()){
        	$tiposContaAutenticado = DB::table('UtilizadoresTiposConta')
        						->select('UtilizadoresTiposConta.*','usersTipologia.descricaoTipoConta')
        						->join('usersTipologia','usersTipologia.idTipoConta','=','UtilizadoresTiposConta.idTipologia')
        						->where('UtilizadoresTiposConta.idUser','=',Auth::user()->id)
        						->get();
        }
    ?>

    <div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload - circulo logs-->
	
	<div id="page">
		@include('frontend.template.apresentacao')

	    <main>
	    	 <?php if(isset($alertaAtivacaoConta)) { ?>
        	<?php if($alertaAtivacaoConta == 1) { ?>
        		<div class="alert alert-success" style="text-align: center;">A sua conta foi ativada com sucesso. Agora poderá autenticar-se na barra de ferramentas no topo da página. Equipa Wote.</div>
        		<?php } else { ?>
        		<div class="alert alert-danger" style="text-align: center;">Código de ativação errado. A sua conta já se encontra ativada ou procedeu a uma recuperação de password. Tente mais tarde. Equipa Wote.</div>
        		<?php } ?>
        <?php } ?>

		    @include('frontend.template.slider')

		    @yield('conteudoPagina')
	    </main>


    @include('frontend.template.footer')



    

	
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Botão para ir para topo (ver css) -->

</body>


@include('frontend.template.scriptsFix')
@yield('scriptsFooter')
</html>
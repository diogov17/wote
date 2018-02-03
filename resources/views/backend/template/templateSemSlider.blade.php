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
        						->select('UtilizadoresTiposConta.*')
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
		    @yield('conteudoPagina')
	    </main>


    @include('frontend.template.footer')



    @yield('scriptsFooter')

	
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Botão para ir para topo (ver css) -->

</body>


@include('frontend.template.scriptsFix')

</html>
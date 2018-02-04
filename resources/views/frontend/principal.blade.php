@extends('frontend.template.template')



	@section('scriptsHeader')

	@stop



	@section('conteudoPagina')




	<div class="bg_color_1">
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Destaques</h2>
				<p>Encontra o artista ideal para o teu espetáculo.</p>
			</div>
			<div class="row">

				<?php
				for ($i = 1; $i <= 6; $i++) { ?>

    				<div class="col-lg-4 col-md-6">
						<div class="box_list home">
							<a href="#0" data-toggle="tooltip" data-placement="top" title="Adicionar à WishList" class="wish_bt"></a>
							<figure>

								<a href="detail-page.html"><img src="artistas/1.jpg" class="img-fluid" alt=""></a>
								<div class="preview"><span>Ver mais</span></div>
							</figure>
							<div class="wrapper">
								<small>Pop</small> <small>Fado</small> <small>Braga</small> <small>Lisboa</small>
								<h3>Art and Art</h3>
								<p>Esta é uma descrição qualquer inventada por mim, ok? Deiem bom feedback por favor!!!</p>
								<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i> <small>(23)</small></span>
								<a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
							</div>
							<ul>
								<li><i class="icon-eye-7"></i> 854 Visualizações</li>
								<li><a href="#">Ver Página</a></li>
							</ul>
						</div>
					</div>

		  <?php } ?>

			<!-- /row -->
		</div>
		<p class="text-left add_top_30"><a href="list.html" class="btn_1 medium">Todos Artistas</a></p>
		<!-- /container -->
	</div>


	<div class="bg_color_1">
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Últimos espetáculos confirmados pela plataforma</h2>
				<p>Aqui terás acesso em tempo real aos últimos espetáculos que foram fechados com artistas da plataforma. Está atento!</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<div class="item">
					<a href="#">
						<div class="views"><i class="fa fa-ticket"></i>33</div>
						<div class="title">
							<h4>Café Lusitana <em>São Vitor - Braga</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;22 de Dezembro - 21:00h</em> </h4>
						</div><img src="espetaculos/1.jpg" alt="">
					</a>
				</div>

				<div class="item">
					<a href="#">
						<div class="views"><i class="fa fa-ticket"></i>109</div>
						<div class="title">
							<h4>Espetáculo AAA <em>Parque Nações - Lisboa</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;31 de Dezembro - 23:00h</em> </h4>
						</div><img src="espetaculos/2.jpg" alt="">
					</a>
				</div>


				<div class="item">
					<a href="#">
						<div class="views"><i class="fa fa-ticket"></i>109</div>
						<div class="title">
							<h4>Espetáculo AAA <em>Parque Nações - Lisboa</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;31 de Dezembro - 23:00h</em> </h4>
						</div><img src="espetaculos/2.jpg" alt="">
					</a>
				</div>

				<div class="item">
					<a href="#">
						<div class="views"><i class="fa fa-ticket"></i>109</div>
						<div class="title">
							<h4>Espetáculo AAA <em>Parque Nações - Lisboa</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;31 de Dezembro - 23:00h</em> </h4>
						</div><img src="espetaculos/2.jpg" alt="">
					</a>
				</div>


				<div class="item">
					<a href="#">
						<div class="views"><i class="fa fa-ticket"></i>109</div>
						<div class="title">
							<h4>Espetáculo AAA <em>Parque Nações - Lisboa</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;31 de Dezembro - 23:00h</em> </h4>
						</div><img src="espetaculos/2.jpg" alt="">
					</a>
				</div>

				
			</div>
			<!-- /carousel -->
		</div>
		<!-- /container -->
	</div>
	<!-- /white_bg -->






	<div class="container margin_120_95">
		<div class="main_title">
			<h2>Como funciona a plataforma?</h2>
			<p>A plataforma tem como objetivo potenciar os artistas e bandas emergentes, juntando todos pela música!</p>
		</div>
		<div class="row add_bottom_30">
			<div class="col-lg-4">
				<div class="box_feat" id="icon_1">
					<span></span>
					<h3>És um organizador de eventos?</h3>
					<p>Estás à procura de alguém para um concerto no teu estabelecimento ou para um evento? Queres encontrar um artista novo, com potencial?</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box_feat" id="icon_2">
					<span></span>
					<h3>És um artista que pretende potenciar o seu currículo e ganhar novos espetáculos?</h3>
					<p>Aqui podes divulgar os teus serviços, gerir o teu calendário, a tua página profissional, e muito mais!!</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="box_feat" id="icon_3">
					<h3>Frequentas um café, um local onde existem eventos musicais?</h3>
					<p>Se queres saber em primeira mão o que poderás ouvir no local favorito onde frequentas, este é o teu espaço! Conhece novos talentos musicais!</p>
				</div>
			</div>
		</div>
		<!-- /row -->
		<!--<p class="text-center"><a href="#" class="btn_1 medium"><strong>É grátis!</strong> Regista-te</a></p>-->

	</div>
	<!-- /container -->

	

	<div id="app_section">
		<div class="container">
			<div class="row justify-content-around">
				<div class="col-md-5">
					<p><img src="libs/img/musicIcon.png" alt="" class="img-fluid" width="500" height="433"></p>
				</div>
				<div class="col-md-6">
					<small>Wote</small>
					<h3>De que estás à espera? <strong>É GRÁTIS!!</strong>. </h3>
					<p class="lead">Entra no mundo da música!</p>
					<div class="app_buttons wow" data-wow-offset="100">
						<!-- icon seta - alargada efeito 3,3,1-->
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
						<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
						<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
						<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
					</svg>
						<a href="#0" class="fadeIn" class="btn btn-success" style="font-size: 35px;"></strong> Registo</a></a>
						
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /app_section -->


@stop



@section('scriptsFooter')


@stop

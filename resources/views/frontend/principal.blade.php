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

					<div style="float: left;" class="col-lg-6">
						  <?php 
						  		$middle = ceil(count($anunciosHome)/2);

						  		for($i = 0; $i < $middle; $i++) 
								{ 
									$anuncio = $anunciosHome[$i] ?>
									
									<div class="box_list wow fadeIn">
										<a href="#0" class="wish_bt"></a>
										<figure>
											<a href="/artista/{{$anuncio->idUtilizador}}"><img src="{{ $anuncio->urlImagemAnuncio }}" class="img-fluid" alt="">
												<div class="preview"><span>Ler mais</span></div>
											</a>
										</figure>
										<div class="wrapper">
											<small>{{ trans('messages.Artista') }}</small>
											<h3>{{ $artistasAnuncios[$anuncio->idUtilizador]->name }}</h3>
											<p>{{ $anuncio->textoAnuncio }}</p>
											<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
											<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
										</div>
										<ul>
											<li><i class="icon-eye-7"></i> {{ $anuncio->nrVisualizacoes }} Visualizações</li>
											<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
											<li><a href="/artista/{{$anuncio->idUtilizador}}">Ver Página</a></li>
										</ul>
									</div>
						  <?php } ?>
						</div>
						<div style="float: right;" class="col-lg-6">
						  <?php for(; $i < count($anunciosHome); $i++) 
								{ 
									$anuncio = $anunciosHome[$i] ?>
									<div class="box_list wow fadeIn">
										<a href="#0" class="wish_bt"></a>
										<figure>
											<a href="/artista/{{$anuncio->idUtilizador}}"><img src="{{ $anuncio->urlImagemAnuncio }}" class="img-fluid" alt="">
												<div class="preview"><span>Ler mais</span></div>
											</a>
										</figure>
										<div class="wrapper">
											<small>{{ trans('messages.Artista') }}</small>
											<h3>{{ $artistasAnuncios[$anuncio->idUtilizador]->name }}</h3>
											<p>{{ $anuncio->textoAnuncio }}</p>
											<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
											<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
										</div>
										<ul>
											<li><i class="icon-eye-7"></i> {{ $anuncio->nrVisualizacoes }} Visualizações</li>
											<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
											<li><a href="/artista/{{$anuncio->idUtilizador}}">Ver Página</a></li>
										</ul>
									</div>
						  <?php } ?>
						</div>
						<!-- /box_list -->
			</div>
		<!-- /row -->
		<p class="text-left add_top_30"><a href="/artista" class="btn_1 medium">Todos Artistas</a></p>
		<!-- /container -->
	</div>


	<div class="bg_color_1">
		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Últimos espetáculos confirmados pela plataforma</h2>
				<p>Aqui terás acesso em tempo real aos últimos espetáculos que foram fechados com artistas da plataforma. Está atento!</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">

				@foreach($ultimosEspetaculos as $evento)
					<div class="item">
						<a href="/evento/{{$evento->idEvento}}">
							<div class="views"><i class="fa fa-ticket"></i>?</div>
							<div class="title">
								<h4>{{ $evento->tituloEvento}} <em>{{$evento->moradaLocal}}</em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;{{$evento->dataInicioEvento}}</em> </h4>
							</div><img src="{{$evento->urlImagemEvento}}" alt="">
						</a>
					</div>
				@endforeach

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
						<a href="/login" class="fadeIn" class="btn btn-success" style="font-size: 35px;"></strong> Registo</a></a>
						
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

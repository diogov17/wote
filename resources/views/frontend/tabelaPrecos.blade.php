@extends('frontend.template.templateSemSlider')



	@section('scriptsHeader')


	<link href="{{ asset('libs/css/tables.css') }}" rel="stylesheet">
    
	
	<!-- Modernizr - Plugin adicionado para fix css -->
	<script src="{{ asset('libs/js/modernizr_tables.js') }}"></script>
	@stop

	@section('conteudoPagina')
	
	<div id="breadcrumb">
		<div class="container">
			<ul>
				<li><a href="{{ URL::action('HomeController@index')}}">Página Principal</a></li>
				<li>Tabela de Preços</li>
			</ul>
		</div>
	</div>


	<div class="margin_60_35">
		<div class="container">
			<div class="main_title">
				<h1>Pricing WOTE</h1>
				<p>Pagamentos mensais</p>
			</div>
		</div>
		
		<div class="pricing-container cd-has-margins">
		<ul class="pricing-list">
			<li>
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2>Base</h2>

							<div class="price">
								<span class="currency"></span>
								<span class="price-value">GRÁTIS</span>
								
							</div>
						</header>
						<!-- /pricing-header -->
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>Anúncio </em>dos serviços que prestas</li>
								<li><em>Visibilidade</em> reduzida</li>
								<li><em>Perfil</em> básico</li>
								<li><em>Orçamentos</em> limitados</li>
								<li><em>Promoção redes sociais</em> não incluída</li>
							</ul>
						</div>
						<!-- /pricing-body -->
						<footer class="pricing-footer">
							<a class="select-plan" href="{{ URL::action('RegisterController@registoArtista', ['tipoContaPremium' => '1']) }}">Sou Artista</a>
							<a class="select-plan" href="{{ URL::action('RegisterController@registoOrganizador', ['tipoContaPremium' => '1']) }}">Sou Organizador</a>
						</footer>
					</li>
				</ul>
				<!-- /pricing-wrapper -->
			</li>
			<li class="popular">
				<ul class="pricing-wrapper">
					<li class="is-visible">
						<header class="pricing-header">
							<h2>Premium</h2>
							<div class="price">
								<span class="currency">€</span>
								<span class="price-value">50</span>
								<span class="price-duration">mês</span>
							</div>
						</header>
						<!-- /pricing-header -->
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>Anúncio </em>dos serviços que prestas</li>
								<li><em>Visibilidade</em> reduzida</li>
								<li><em>Perfil</em> básico</li>
								<li><em>Orçamentos</em> limitados</li>
								<li><em>Promoção redes sociais</em> não incluída</li>
							</ul>
						</div>
						<!-- /pricing-body -->
						<footer class="pricing-footer">
							<a class="select-plan" href="{{ URL::action('RegisterController@registoArtista', ['tipoContaPremium' => '2']) }}">Sou Artista</a>
							<a class="select-plan" href="{{ URL::action('RegisterController@registoOrganizador', ['tipoContaPremium' => '2']) }}">Sou Organizador</a>
						</footer>
					</li>
				</ul>
				<!-- /cd-pricing-wrapper -->
			</li>
			
		</ul>
		<!-- /pricing-list -->
	</div>
	<!-- /pricing-container -->	
	</div>
	<!-- /margin_60_35 -->
	
	
	<!-- /container -->
    </main>
    <!-- /main -->
	
		@stop



@section('scriptsFooter')


@stop

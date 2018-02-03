	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="{{ asset('index-2.html') }}" title="Findoctor">
							<img src="{{ asset('libs/img/logo.png') }}" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Sobre</h5>
					<ul class="links">
						<li><a href="#0">Sobre nós</a></li>
						<li><a href="{{ URL::action('HomeController@termosCondicoes') }}">Como Funciona</a></li>
						<li><a href="{{ URL::action('HomeController@faq') }}">FAQ</a></li>
						<li><a href="{{ route('login') }}">Login</a></li>
						<li><a href="{{ URL::action('HomeController@index') }}">Registo</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Links Úteis</h5>
					<ul class="links">
						<li><a href="{{ URL::action('ArtistasController@index') }}">Artistas</a></li>
						<li><a href="{{ URL::action('EventosController@index') }}">Eventos</a></li>
						<li><a href="{{ URL::action('OrganizadoresController@index') }}">Organizadores</a></li>
						<li><a href="{{ URL::action('LocaisController@index') }}">Locais</a></li>
						<li><a href="{{ URL::action('HomeController@tabelaPrecos') }}">Tabela de Preços</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Queres contactar-nos?</h5>
					<ul class="contacts">
						<li><a href="{{ URL::action('HomeController@duvidaUtilizacao') }}">Dúvida Utilização</a></li>
						<li><a href="{{ URL::action('HomeController@formContacto', ['tipoContacto' => '2']) }}">Departamento Financeiro</a></li>
					</ul>
					<div class="follow_us">
						<h5>Segue-nos!</h5>
						<ul>
							<li><a href="#0"><i class="social_facebook"></i></a></li>
							<li><a href="#0"><i class="social_twitter"></i></a></li>
							<li><a href="#0"><i class="social_linkedin"></i></a></li>
							<li><a href="#0"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="{{ URL::action('HomeController@termosCondicoes') }}">Termos e Condições</a></li>
						<li><a href="{{ URL::action('HomeController@politicaPrivacidade') }}">Privacidade</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2017 Wote</div>
				</div>
			</div>
		</div>
	</footer>

	
		
	<header class="header_sticky">	
		<a href="#menu" class="btn_mobile">
			<div class="woteMenu woteMenu--spin" id="woteMenu">
				<div class="woteMenu-box">
					<div class="woteMenu-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="{{ URL::action('HomeController@index') }}" title="Wote">Wote</a></h1>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<!-- Login/Registo -> icons (usar pe) -->
					<ul id="top_access">
						<?php if(Auth::user()){?>

						<li id="user">
							<a href="{{ URL::action('AreaReservadaController@index')}}">
								<figure><img src="<?php 
														if(empty(Auth::user()->urlLogotipo)){
															echo url('libs/img/noLogo.png');
														} else echo url(Auth::user()->urlLogotipo);
												?>" alt=""></figure>
								<?php echo Auth::user()->name;?>
							</a>
							<br>
							<a style="padding-right: 12px; font-size: 12px;"><span id="tipoContaText" style="margin-right: 10px;">
								<?php $i=0; 

									foreach ($tiposContaAutenticado as $tConta ) {
										if($i>0){
											echo " | ";
										}
										echo $tConta->descricaoTipoConta;
									} ?></span></a>
						</li>
							<?php } else { ?>
						<li><a href="{{ route('login') }}"><i class="pe-7s-user" style="padding-top: 15px;"></i></a></li>
							<?php } ?>
					</ul>
					<nav id="menu" class="main-menu">
						<ul>

							<li>
								<span><a href="/home">{{ trans('messages.Home') }}</a></span>
							</li>
							<li>
								<span><a href="#">{{ trans('messages.Artistas') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('ArtistasController@index') }}">Procurar Artista</a></li>
									<li><a href="{{ URL::action('RegisterController@show', ['artista'] ) }}">Sou um Artista</a></li>
								</ul>
							</li>

							
							<li>
								<span><a href="#0">{{ trans('messages.Eventos') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('EventosController@index') }}">Procurar Eventos</a></li>
									<li><a href="{{ URL::action('EventosController@index',['filtro' => 'populares', 'by' => 'desc'] ) }}">Mais Populares</a></li>
                                	<li><a href="{{ URL::action('EventosController@index',['filtro' => 'fimdesemana', 'by' => 'desc'] ) }}">No Próximo Fim de Semana</a></li>
                                    <li><a href="{{ URL::action('EventosController@index',['precoEntradaLimite' => '0', 'by' => 'desc'] ) }}">Entrada Grátis</a></li>
                                    <li><a href="{{ URL::action('BilheteiraController@index') }}">Bilheteira</a></li>
								</ul>
							</li>


							<li>
								<span><a href="#0">{{ trans('messages.Organizadores') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('OrganizadoresController@index') }}">Pesquisar Organizadores</a></li>
								</ul>
							</li>

							<?php if( Auth::user() ) {
								$mostraCaixaCorreio = 0; 
								foreach ($tiposContaAutenticado as $tipoContaAuth) {
									if($tipoContaAuth->idTipologia == 1 || $tipoContaAuth->idTipologia == 2 ){
										$mostraCaixaCorreio = 1;
									}
								}

								if($mostraCaixaCorreio == 1){ ?>

							<li>
								<span><a href="#0">{{ trans('messages.Negócios') }}</a></span>
								<ul>
									<li><a href="#">Caixa de Correio</a></li>
									<li><a href="#">Meus Orçamentos</a></li>
									<li><a href="#">Participações Eventos</a></li>
								</ul>
							</li>

							<?php } } ?>


                            <!--<li><span><a href="#">Gerir Minha Página</a></span></li>-->
                            
                            <?php if( Auth::user() ) { ?>
                            <li>
								<span><a href="#0">{{ trans('messages.MeuEspaçoMusical') }}</a></span>
								<ul>
									<?php  if($mostraCaixaCorreio == 1){ ?>
									<li><a href="#">Gerir Minha Página</a></li>
									<li><a href="#">Promover Página</a></li>
									<li><a href="#">Meus Seguidores</a></li>
									<?php  }  ?>

									<li><a href="#">Meus Artistas</a></li>
									<li><a href="#">Locais Favoritos</a></li>
									<li><a href="#">Eventos Participei</a></li>

									<li><a href="#">Amigos</a></li>
								</ul>
							</li>
							<?php } ?>
							<li>
								<?php if (LanguageSwitcher::getCurrentLanguage() == 'pt') { ?>
									<span><a href="#"><img src="/img/flags/pt.png" width="30" height="15"/> Português</a></span>
								<?php } else { ?>
									<span><a href="#"><img src="/img/flags/en.png" width="30" height="15"/> English</a></span>
								<?php } ?>

								<ul>
									<li><a href="/lang/en"><img src="/img/flags/en.png" width="30" height="15"/> English</a></li>
									<li><a href="/lang/pt"><img src="/img/flags/pt.png" width="30" height="15"/> Português</a></li>
								</ul>
							</li>

							<li>
								<a href="{{ route('login') }}"><i class="pe-7s-add-user" style="font-size: 2.125rem;"></i></a>
								<ul>
									<li><a href="{{ URL::action('RegisterController@show', ['artista'] ) }}">Artista</a></li>
									<li><a href="{{ URL::action('RegisterController@show', ['organizador'] ) }}">Organizador</a></li>
									<li><a href="{{ URL::action('RegisterController@show', ['fa'] ) }}">Fã</a></li>
								</ul>
							</li>

						</ul>

					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

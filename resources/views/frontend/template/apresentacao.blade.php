		
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
				<div class="col-lg-2">
					<div id="logo_home">
						<h1><a href="{{ URL::action('HomeController@index') }}" title="Wote">Wote</a></h1>
					</div>
				</div>
				<div class="col-lg-10">
					<!-- Login/Registo -> icons (usar pe) -->
					
					<nav id="menu" class="main-menu">
						<ul>

							<li style="vertical-align: bottom;">
								<span><a href="/home">{{ trans('messages.Home') }}</a></span>
							</li>
							<li style="vertical-align: bottom;">
								<span><a href="{{ URL::action('ArtistasController@index') }}">{{ trans('messages.Artistas') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('ArtistasController@index') }}">Procurar Artista</a></li>
									<li><a href="{{ URL::action('ArtistasController@index',['filtro' => 'populares', 'by' => 'desc'] ) }}">Mais Populares</a></li>
									<?php if(! Auth::user() ) { ?>
									<li><a href="{{ URL::action('RegisterController@show', ['artista'] ) }}">Sou um Artista</a></li>
									<?php } ?>
								</ul>
							</li>

							
							<li style="vertical-align: bottom;">
								<span><a href="{{ URL::action('EventosController@index') }}">{{ trans('messages.Eventos') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('EventosController@index') }}">Procurar Eventos</a></li>
									<li><a href="{{ URL::action('EventosController@index',['filtro' => 'populares', 'by' => 'desc'] ) }}">Mais Populares</a></li>
                                	<li><a href="{{ URL::action('EventosController@index',['filtro' => 'fimdesemana', 'by' => 'desc'] ) }}">No Próximo Fim de Semana</a></li>
                                    <li><a href="{{ URL::action('EventosController@index',['precoEntradaLimite' => '0', 'by' => 'desc'] ) }}">Entrada Grátis</a></li>
								</ul>
							</li>


							<li style="vertical-align: bottom;">
								<span><a href="{{ URL::action('OrganizadoresController@index') }}">{{ trans('messages.Organizadores') }}</a></span>
								<ul>
									<li><a href="{{ URL::action('OrganizadoresController@index') }}">Procurar Organizadores</a></li>
									<li><a href="{{ URL::action('OrganizadoresController@index',['filtro' => 'populares', 'by' => 'desc'] ) }}">Mais Populares</a></li>
								</ul>
							</li>

							<?php if( Auth::user() && strtolower($tiposContaAutenticado[0]->descricaoTipoConta) != 'fã' ) {
								$mostraCaixaCorreio = 0; 
								foreach ($tiposContaAutenticado as $tipoContaAuth) {
									if($tipoContaAuth->idTipologia == 1 || $tipoContaAuth->idTipologia == 2 ){
										$mostraCaixaCorreio = 1;
									}
								}

								if($mostraCaixaCorreio == 1){ ?>

							<li style="vertical-align: bottom;">
								<span><a href="#0">{{ trans('messages.Negócios') }}</a></span>
								<ul>
									<li><a href="#">Caixa de Correio</a></li>
									<li><a href="#">Meus Orçamentos</a></li>
									<li><a href="#">Participações Eventos</a></li>
								</ul>
							</li>

							<?php } } ?>


                            <!--<li><span><a href="#">Gerir Minha Página</a></span></li>-->
                            
                            <?php if( Auth::user() && strtolower($tiposContaAutenticado[0]->descricaoTipoConta) != 'fã' ) { ?>
                            <li style="vertical-align: bottom;">
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
							<li style="vertical-align: bottom;">
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

							<?php if(Auth::user() ) { ?>
								
								<li style="vertical-align: bottom;">
									<span>
										<a href="#">
												<img src="<?php if(empty(Auth::user()->urlLogotipo)) 
																	echo url('img/noLogo.png'); 
																else echo url(Auth::user()->urlLogotipo); ?>" alt="" border="0" 
											style="height: 40px; padding-left: 5px; padding-bottom: -100px;"/>
										</a>
										<!-- a href="{{ route('login') }}"><i class="pe-7s-user" style="font-size: 2.125rem;"></i></a -->
									</span>
									<ul>
										<li>
											<a href="/{{ strtolower($tiposContaAutenticado[0]->descricaoTipoConta) }}/{{ Auth::user()->id }}">Meu Perfil - {{$tiposContaAutenticado[0]->descricaoTipoConta}}</a>
										</li>
										<li>
											<a href="{{ url('/logout') }}"
	                                            onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                            Logout
	                                        </a>

	                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	                                            {{ csrf_field() }}
	                                        </form>
										</li>
									</ul>
								</li>

								<li style="vertical-align: center;">
									<span>
										<a href="#">
											{{ Auth::user()->name }}
											<br>
											<?php $i=0; 

												foreach ($tiposContaAutenticado as $tConta ) {
													if($i>0){
														echo " | ";
													} ?>
													{{ $tConta->descricaoTipoConta }}
											<?php } ?>
										</a>
									</span>
								</li>
							<?php } 
								  else { ?>
								  	<li>
										<a href="{{ route('login') }}"><i class="pe-7s-add-user" style="font-size: 2.125rem;"></i></a>
										<ul>
											<li><a href="{{ URL::action('RegisterController@show', ['artista'] ) }}">Artista</a></li>
											<li><a href="{{ URL::action('RegisterController@show', ['organizador'] ) }}">Organizador</a></li>
											<li><a href="{{ URL::action('RegisterController@show', ['fa'] ) }}">Fã</a></li>
										</ul>
									</li>

									<li><a href="{{ route('login') }}"><i class="pe-7s-user" style="font-size: 2.125rem;"></i></a></li>
							<?php } ?>

						</ul>

					</nav>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

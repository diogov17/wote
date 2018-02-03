@extends('frontend.template.templateSemSlider')



	@section('scriptsHeader')

	@stop

	@section('conteudoPagina')
	<div id="breadcrumb">
		<div class="container">
			<ul>
				<li><a href="{{ URL::action('HomeController@index')}}">Página Principal</a></li>
				<li>Termos e Condições</li>
			</ul>
		</div>
	</div>
	

		<div class="container margin_60">
			<div class="row">
				<aside class="col-lg-3" id="sidebar">
						<div class="box_style_cat" id="faq_box">
							<ul id="cat_nav">
								<li><a href="#propriedade" class="active"><i class="icon_document_alt"></i>Propriedade da Plataforma</a></li>

								<li><a href="#condicoesGerais"><i class="icon_document_alt"></i>Condições Gerais de Utilização</a></li>
								
							</ul>
						</div>
					
				</aside>
	
				
				<div class="col-lg-9" id="faq">
					<h4 class="nomargin_top">Propriedade da Plataforma</h4>
					<div role="tablist" class="add_bottom_45 accordion" id="propriedade">
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator icon_minus_alt2"></i>Propriedade da Plataforma</a>
								</h5>
							</div>

							<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>WOTE com sede em Braga, Universidade do Minho, Largo do paço 4704-553, é a legal proprietária da página web www.????.pt (de agora em diante “a plataforma web”) colocando a mesma à disposição dos utilizadores.</p>

								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Condições Gerais - Aceitação
									</a>
								</h5>
							</div>
							<div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>As condições gerais de utilização da plataforma web agregado com as condições particulares, tem por finalidade informar os utilizadores dos serviços que a WOTE presta e a regulamentação da utilização da plataforma web.</p>
    								<p>A navegação e a utilização dos serviços que a plataforma web disponibiliza pressupõem a aceitação como utilizador e sem reservas de qualquer tipo, de todas as condições gerais de contratação e quaisquer outras que possam existir respeitantes à utilização dos serviços da WOTE.</p>
									<p>A WOTE poderá a todo o  momento, e sem qualquer aviso prévio, alterar as atuais condições gerais bem as condições particulares que se incluam através da publicação das mencionadas alterações na plataforma web de modo a que as mesmas sejam conhecidas previamente pelos utilizadores. Qualquer alteração que se produza nas mesmas será comunicado na página principal da plataforma durante um prazo que se tenha como razoável.</p>
								</div>
							</div>
						</div>

					</div>
					
					
					<h4 class="nomargin_top">Condições Gerais de Utilização</h4>
					<div role="tablist" class="add_bottom_45 accordion" id="condicoesGerais">
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#tab0Aux" aria-expanded="true"><i class="indicator icon_plus_alt2"></i>Política de Proteção de Dados Pessoais</a>
								</h5>
							</div>

							<div id="tab0Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>Em conformidade com o estabelecido na Lei de Proteção de Dados Pessoais nº 67/98, de 26 de outubro, informamos que a existência de uma base de dados de carácter pessoal criada com dados obtidos através da plataforma WOTE, tem a finalidade de realizar a gestão de dados dos utilizadores registados na plataforma, com o intuito de verem esses dados serem partilhados a todos os utilizadores da mesma, e assim terem o seu trabalho/propensões difundidos a todos os interessados.</p>
									<p>O utilizador pode exercer o seu direito de acesso, alteração, cancelamento e oposição permitidos pela Lei de Proteção de Dados Pessoais, endereçando comunicação escrita à WOTE para o endereço de correio electrónico ???@???.com indicando o nome e direito que pretende exercer (acesso, alteração ou cancelamento), indicando os seus dados pessoais.</p>
								</div>
							</div>
						</div>
						
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab1Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Consentimento do Utilizador e Envio de Comunicações Comerciais por Via Eletrónica
									</a>
								</h5>
							</div>
							<div id="tab1Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>??????????</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab2Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Medidas de Segurança
									</a>
								</h5>
							</div>
							<div id="tab2Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>A WOTE declara ter tomado as medidas de segurança necessárias e mais adequadas ao estabelecimento das leis em vigor e garantiu todos os meios técnicos ao seu alcance com o intuito de evitar a perda, mau uso, alteração, acesso não autorizado ou roubo dos dados que o utilizador disponibilize sem detrimento ao tópico Responsabilidade da WOTE apresentado neste Aviso Legal.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab3Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Cookies
									</a>
								</h5>
							</div>
							<div id="tab3Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>A plataforma web da WOTE não utiliza cookies, não havendo o registo dos utilizadores pela sua mera visita.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab4Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Cedência de Dados
									</a>
								</h5>
							</div>
							<div id="tab4Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>A WOTE não cederá ou comunicará os dados pessoais disponibilizados pelo utilizador através da plataforma web a nenhuma outra entidade.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab5Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Propriedade Industrial e Intelectual
									</a>
								</h5>
							</div>
							<div id="tab5Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>Todos os conteúdos incluídos na plataforma web e em particular as marcas, nomes comerciais, desenhos industriais, patentes, desenhos, textos, fotografias, gráficos, logótipos, software ou quaisquer outros sinais susceptíveis de utilização industrial e comercial estão protegidos por direitos de propriedade industrial e intelectual da WOTE ou de terceiros titulares dos mesmos que tenham autorizado a sua inclusão na plataforma web. Fica por isso proibida qualquer utilização e ou reprodução dos mesmos sem consentimento expresso da WOTE;</p>
									<p>A WOTE não será responsável pela violação dos direitos de propriedade intelectual ou industrial de terceiros que possa resultar da inclusão na plataforma web de marcas, nomes comerciais, desenhos industriais, patentes, desenhos, textos, fotografias, gráficos, logótipos, ou software pertencentes a terceiros que hajam declarado ser titulares dos mesmos;</p>
									<p>Em caso algum se entenderá que o acesso e a navegação do utilizador implica uma autorização ou uma renúncia, transmissão ou cedência total ou parcial dos referidos direitos ou da concessão de nenhum direito ou expectativa de direito e em concreto, da alteração, transformação, exploração, reprodução, distribuição ou comunicação pública sobre os conteúdos sem a autorização prévia e expressa da WOTE ou dos titulares correspondentes;</p>
									<p>A WOTE autoriza a criação de vínculos em relação à sua plataforma a partir de quaisquer outras páginas web sempre que estas estejam relacionadas com o sector artístico/musical. Os laços que se estabeleçam deverão sempre fazer-se pela página principal da WOTE, ou sendo tal o caso, naquela que a própria WOTE determinar; </p>
									<p>A WOTE não será responsável pelo conteúdo das páginas web de destino que se estabeleçam mediante vínculos na plataforma web nem pelas violações de direitos de terceiros em que as mencionadas páginas possam incorrer.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab6Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Responsabilidades da WOTE
									</a>
								</h5>
							</div>
							<div id="tab6Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>O utilizador reconhece e aceita que a utilização da plataforma web e os seus respectivos serviços se realiza sob a sua inteira responsabilidade.</p>
									<p>A WOTE declara ter adotado todas as medidas necessárias, dentro das suas possibilidades, para garantir o bom funcionamento da plataforma web e evitar a existência e transmissão de vírus e outros componentes que possam prejudicar o utilizador.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab7Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Obrigações do Utilizador
									</a>
								</h5>
							</div>
							<div id="tab7Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>O utilizador compromete-se a usar os conteúdos de forma diligente, correcta e lícita e compromete-se a não atuar da seguinte forma:</p>
									<p>Utilizar os conteúdos com fins ou efeitos contrários à lei, à moral e aos bons costumes e à ordem pública;</p>
									<p>Reproduzir, copiar, distribuir, permitir o acesso do público através de qualquer modalidade de comunicação pública, transformar ou modificar os conteúdos, a menos que se obtenha a devida autorização do titular;</p>
									<p>Utilizar os conteúdos da plataforma web para destinar publicidade, mensagens não solicitadas dirigidas a uma pluralidade de pessoas independentemente da sua finalidade.</p>
								</div>
							</div>
						</div>
					</div>
					

				</div>
		
			</div>
		
		</div>



		@stop



@section('scriptsFooter')


@stop

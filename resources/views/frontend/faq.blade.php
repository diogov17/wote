@extends('frontend.template.templateSemSlider')



	@section('scriptsHeader')

	@stop

	@section('conteudoPagina')
	<div id="breadcrumb">
		<div class="container">
			<ul>
				<li><a href="{{ URL::action('HomeController@index')}}">Página Principal</a></li>
				<li>Perguntas Frequentes</li>
			</ul>
		</div>
	</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
			<div class="row">
				
				
				<div class="col-lg-12" id="faq">
					<h4 class="nomargin_top">Questões Frequentes</h4>
					<div role="tablist" class="add_bottom_45 accordion" id="propriedade">
						
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapseOne_payment" aria-expanded="true"><i class="indicator icon_minus_alt2"></i>Quanto tempo leva até o meu perfil ser verificado?
</a>
								</h5>
							</div>

							<div id="collapseOne_payment" class="collapse show" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>Após a criação do perfil e de serem enviados todos os documentos necessários para a verificação da conta, será enviado um email a confirmar a verificação da conta.</p>

								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Pode ser usada a conta do Facebook para fazer o registo na plataforma?
									</a>
								</h5>
							</div>
							<div id="collapseTwo_payment" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>Sim. Para um registo mais rápido na plataforma poderá ser usada a conta do Facebook.</p>
								</div>
							</div>
						</div>


						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapseAA" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>Se não estiver registado na plataforma posso usar a plataforma?

									</a>
								</h5>
							</div>
							<div id="collapseAA" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>Para quem não tiver registo efetuado na plataforma apenas poderá fazer pesquisas na mesma, sejam essas pesquisas de eventos, artistas ou até mesmo outros utilizadores da plataforma. Para poder ter acesso às outras funcionalidades da plataforma terá de proceder ao devido registro.</p>
								</div>
							</div>
						</div>


							<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#tab0Aux" aria-expanded="true"><i class="indicator icon_plus_alt2"></i>O meu calendário é acessível a outros utilizadores?</a>
								</h5>
							</div>

							<div id="tab0Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>Sim. O calendário é acessível a todos os utilizadores da plataforma sejam eles organizadores de eventos, artistas ou seguidores. Para ter um calendário privado poderá</p>
								</div>
							</div>
						</div>
						
						<!-- /card -->
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#tab1Aux" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i>É possível não apresentar preços na montra do meu perfil?

									</a>
								</h5>
							</div>
							<div id="tab1Aux" class="collapse" role="tabpanel" data-parent="#tips">
								<div class="card-body">
									<p>Não. Terá de ser apresentado um preço mínimo de atuação cobrado pelo artista, uma vez que esse é um dos fatores de pesquisa na plataforma. O preço, posteriormente, poderá ser negociado com potenciais organizadores. </p>
								</div>
							</div>
						</div>

					</div>
					
					

				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>



		@stop



@section('scriptsFooter')


@stop

@extends('frontend.template.template')



	@section('scriptsHeader')

	@stop

	@section('conteudoPagina')


   <div id="results">
       <div class="container">
           <div class="row">
               <div style="padding-top: 20px; " class="col-md-12">
                   <h4><strong>Mostrando {{count($artistas)}} resultados</h4>
               </div>
           </div>
           <!-- /row -->
       </div>
       <!-- /container -->
   </div>
   <!-- /results -->
   
   <div class="filters_listing">
		<div class="container">
			<ul class="clearfix">
				<li>
					<h6>Type</h6>
					<div class="switch-field">
						<input type="radio" id="all" name="type_patient" value="all" checked>
						<label for="all">All</label>
						<input type="radio" id="doctors" name="type_patient" value="doctors">
						<label for="doctors">Doctors</label>
						<input type="radio" id="clinics" name="type_patient" value="clinics">
						<label for="clinics">Clinics</label>
					</div>
				</li>
				<li>
					<h6>Layout</h6>
					<div class="layout_view">
						<a href="#0" class="active"><i class="icon-th"></i></a>
						<a href="list.html"><i class="icon-th-list"></i></a>
						<a href="list-map.html"><i class="icon-map-1"></i></a>
					</div>
				</li>
				<li>
					<h6>Sort by</h6>
					<select name="orderby" class="selectbox">
					<option value="Closest">Closest</option>
					<option value="Best rated">Best rated</option>
					<option value="Men">Men</option>
					<option value="Women">Women</option>
					</select>
				</li>
			</ul>
		</div>
		<!-- /container -->
	</div>
	<!-- /filters -->
	   
	<div class="container-fluid margin_60_35">
		<div class="row">

			<div class="col-lg-3">
					<aside style="padding-left: 50px; padding-right: 100px;" class="col-lg-12" id="filtersidebar">
						<h3>Pesquisa Avançada</h3>
							<div class="form-group">
									<div hidden="true">
									<label>País</label>
									<select class="form-control pais select2 searchable" name="pais" id="idPais">
										<option value="0">--</option>
										<option value="1">Sample Text</option>
										<option value="2">Celeirós</option>
									</select>
									<label>Concelho</label>
									<select class="form-control pais select2 searchable" name="concelho" id="idConcelho">
										<option value="0">--</option>
										<option value="1">Sample Text</option>
										<option value="2">Celeirós</option>
									</select>
									<label>Distrito</label>
									<select class="form-control pais select2 searchable" name="distrito" id="idDistrito">
										<option value="0">--</option>
										<option value="1">Sample Text</option>
										<option value="2">Celeirós</option>
									</select>
								</div>
									<label>Preço mínimo</label>
									<input type="text" class="form-control searchable" placeholder="0€" id="precoInicio" name="precoInicio"/>
									<label>Preço máximo</label>
									<input type="text" class="form-control searchable" placeholder="0€" id="precoFim" name="precoFim"/>
									<label>Número mínimo de seguidores</label>
									<input type="text" class="form-control searchable" placeholder="0" id="nrSeguidoresLow" name="nrSeguidoresLow"/>
									<label>Número máximo de seguidores</label>
									<input type="text" class="form-control searchable" placeholder="0" id="nrSeguidoresHigh" name="nrSeguidoresHigh"/>
									<label>Feedback mínimo</label>
									<input type="text" class="form-control searchable" placeholder="0" id="feedbackLow" name="feedbackLow"/>
									<label>Feedback máximo</label>
									<input type="text" class="form-control searchable" placeholder="0" id="feedbackHigh" name="feedbackHigh"/>
							</div>					
					</aside>
					<!-- /aside -->

					<br>
					<br>

					<aside class="col-lg-3" id="mystickysidebar">
						<div class="normal_list">
							<img width="420px" src="ads/dummyad3.jpg">
						</div>
					</aside>
					<!-- /aside -->

					<style>
						#mystickysidebar {
							position: -webkit-sticky;
						    position: sticky;
						    top: 95px;
						}
					</style>
			</div>	

			<div class="col-lg-6">
				<div class="row">
					<div style="float: left;" class="col-lg-6">
					  <?php 
					  		$middle = ceil(count($artistas)/2);

					  		for($i = 0; $i < $middle; $i++) 
							{ 
								$artista = $artistas[$i] ?>
								
								<div class="box_list wow fadeIn">
									<a href="#0" class="wish_bt"></a>
									<figure>
										<a href="/artista/{{$artista->id}}"><img src="{{ $profilePics[$artista->id] }}" class="img-fluid" alt="">
											<div class="preview"><span>Ler mais</span></div>
										</a>
									</figure>
									<div class="wrapper">
										<small>{{ trans('messages.Artista') }}</small>
										<h3>{{ $artista->name }}</h3>
										<p>{{ $artista->descricao }}</p>
										<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
										<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
									</div>
									<ul>
										<li><i class="icon-eye-7"></i> {{ $artista->nrSeguidoresTotal }} Seguidores</li>
										<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
										<li><a href="/artista/{{$artista->id}}">Ver Página</a></li>
									</ul>
								</div>
					  <?php } ?>
					</div>
					<div style="float: right;" class="col-lg-6">
					  <?php for(; $i < count($artistas); $i++) 
							{ 
								$artista = $artistas[$i] ?>
								<div class="box_list wow fadeIn">
									<a href="#0" class="wish_bt"></a>
									<figure>
										<a href="/artista/{{$artista->id}}"><img src="{{ $profilePics[$artista->id] }}" class="img-fluid" alt="">
											<div class="preview"><span>Ler mais</span></div>
										</a>
									</figure>
									<div class="wrapper">
										<small>{{ trans('messages.Artista') }}</small>
										<h3>{{ $artista->name }}</h3>
										<p>{{ $artista->descricao }}</p>
										<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
										<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
									</div>
									<ul>
										<li><i class="icon-eye-7"></i> {{ $artista->nrSeguidoresTotal }} Seguidores</li>
										<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
										<li><a href="/artista/{{$artista->id}}">Ver Página</a></li>
									</ul>
								</div>
					  <?php } ?>
					</div>
					<!-- /box_list -->

				</div>
				<!-- /row -->

			</div>
			<!-- /col -->
			
			<aside class="col-lg-3" id="sidebar">
				<div class="normal_list">
					<img width="420px" src="ads/dummyad.jpg">
				</div>
			</aside>
			<!-- /aside -->
			
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->



@stop



@section('scriptsFooter')


@stop

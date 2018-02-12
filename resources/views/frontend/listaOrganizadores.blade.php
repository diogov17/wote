@extends('frontend.template.template')



	@section('scriptsHeader')

	@stop

	@section('conteudoPagina')


   <div id="results">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <h4><strong>Showing 10</strong> of {{ count($organizadores) }} results (fazer contas)</h4>
               </div>
               <div class="col-md-6">
                    <div class="search_bar_list">
                    <input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
                    <input type="submit" value="Search">
                </div>
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

			<aside style="padding-left: 50px; padding-right: 100px;" class="col-lg-3" id="filtersidebar">
				<h3>Pesquisa Avançada</h3>
					<div class="form-group">
						<label>País</label>
						<select class="form-control pais select2" name="pais" id="pais">
							<option value="0">--</option>
							<option value="1">Sample Text</option>
							<option value="2">Celeirós</option>
						</select>
						<label>Concelho</label>
						<select class="form-control pais select2" name="concelho" id="concelho">
							<option value="0">--</option>
							<option value="1">Sample Text</option>
							<option value="2">Celeirós</option>
						</select>
						<label>Distrito</label>
						<select class="form-control pais select2" name="distrito" id="distrito">
							<option value="0">--</option>
							<option value="1">Sample Text</option>
							<option value="2">Celeirós</option>
						</select>
						<label>Preço mínimo</label>
						<input type="text" class="form-control" placeholder="0€" />
						<label>Preço máximo</label>
						<input type="text" class="form-control" placeholder="17.35€" />
						<label>Número mínimo de seguidores</label>
						<input type="text" class="form-control" placeholder="0" />
						<label>Feedback</label>
						<input type="text" class="form-control" placeholder="0" />
					</div>					
			</aside>
			<!-- /aside -->

			<div class="col-lg-6">
				<div class="row">
					<div style="float: left;" class="col-lg-6">
					  <?php 
					  		$middle = ceil(count($organizadores)/2);

					  		for($i = 0; $i < $middle; $i++) 
							{ 
								$organizador = $organizadores[$i] ?>
								
								<div class="box_list wow fadeIn">
									<a href="#0" class="wish_bt"></a>
									<figure>
										<a href="/organizador/{{$organizador->id}}"><img src="{{ $profilePics[$organizador->id] }}" class="img-fluid" alt="">
											<div class="preview"><span>Ler mais</span></div>
										</a>
									</figure>
									<div class="wrapper">
										<small>{{ trans('messages.Organizador') }}</small>
										<h3>{{ $organizador->name }}</h3>

										<p>{{ $organizador->descricao }}</p>
										<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
										<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
									</div>
									<ul>
										<li><i class="icon-eye-7"></i> {{ $organizador->nrSeguidoresTotal }} Seguidores</li>
										<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
										<li><a href="/organizador/{{$organizador->id}}">Ver Página</a></li>
									</ul>
								</div>
					  <?php } ?>
					</div>
					<div style="float: right;" class="col-lg-6">
					  <?php for(; $i < count($organizadores); $i++) 
							{ 
								$organizador = $organizadores[$i] ?>

								<div class="box_list wow fadeIn">
									<a href="#0" class="wish_bt"></a>
									<figure>
										<a href="/organizador/{{$organizador->id}}"><img src="{{ $profilePics[$organizador->id] }}" class="img-fluid" alt="">
											<div class="preview"><span>Ler mais</span></div>
										</a>
									</figure>
									<div class="wrapper">
										<small>{{ trans('messages.Organizador') }}</small>
										<h3>{{ $organizador->name }}</h3>

										<p>{{ $organizador->descricao }}</p>
										<span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span>
										<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
									</div>
									<ul>
										<li><i class="icon-eye-7"></i> {{ $organizador->nrSeguidoresTotal }} Seguidores</li>
										<li><a href="#0" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
										<li><a href="/organizador/{{$organizador->id}}">Ver Página</a></li>
									</ul>
								</div>
					  <?php } ?>
					</div>
					<!-- /box_list -->

				</div>
				<!-- /row -->

				<nav aria-label="" class="add_top_20">
					<ul class="pagination pagination-sm">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
				<!-- /pagination -->
			</div>
			<!-- /col -->
			
			<aside class="col-lg-3" id="sidebar">
				<div id="map_listing" class="normal_list">
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

@extends('frontend.template.template')



	@section('scriptsHeader')
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="{!! asset("libs/css/select2.css")!!}" media="screen">
<style>

	.help-block{
		    color: red;
		    padding-left: 0px;
		    font-size: 12px;
	}
</style>
	@stop



	@section('conteudoPagina')


		<div id="hero_register">
			<div class="container margin_120_95">			
				<div class="row">
					<div class="col-lg-6">
						<h1>Encontra novos artistas e música para os teus ouvidos!</h1>
						<p class="lead">Tudo à distância de um clique!</p>
						<div class="box_feat_2">
							<i class="pe-7s-pin"></i>
							<h3>Sabes se o café há beira de onde moras vai ter um evento esta noite?</h3>
							<p>Sabe tudo aqui!!</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-date"></i>
							<h3>Mantém os teus eventos musicais marcados num só sítio!</h3>
							<p>Poderás fazer marcações, tornar a tua agenda pública para os teus amigos!</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-graph1"></i>
							<h3>Diverte-te.</h3>
							<p>Encontra aqui tudo para que os teus dias sejam diferentes.</p>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-5 ml-auto">
						<div class="box_form">
							<div id="message-register"></div>
							<form method="post" action="{{ URL::action('RegisterController@registoFa') }}" id="novoRegisto">
								{{ csrf_field() }}

								<?php if($erros['errosTeste'] == 3) { ?>
									<div class="alert alert-success">
										 <strong>O seu registo foi efetuado com sucesso. Para ativar a sua conta deverá aceder ao seu email e concluir o registo no link fornecido. Obrigado!</strong>
									</div>
								<?php } else {  ?>



								<?php if($erros['tipoConta'] != '') { ?>
			                        <div class="alert alert-danger">
			                            <strong><?php echo $erros['tipoConta'];?></strong>
			                        </div>
			                    <?php } ?>

			                    

			                    <div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<p>Estás a registar-se como <b>Fã WOTE</b>. Estás a um passo de entrar no mundo da música!</p>
											
											<input id="tipoConta" value="3" name="tipoConta" style="display: none;">
										</div>
									</div>

								</div>


								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<?php if($erros['nomeUser'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['nomeUser'];?></strong>
						                        </span>
						                    <?php } ?>
											<input type="text" class="form-control" placeholder="Nome Utilizador" name="nomeUser" id="nomeUser" value="<?php if(isset($valores) && $valores['nomeUser']) echo $valores['nomeUser'];?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12 ">
										<div class="form-group">
											<?php if($erros['emailUser'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['emailUser'];?></strong>
						                        </span>
						                    <?php } ?>
											<input type="text" class="form-control" placeholder="Email" name="emailUser" id="emailUser" value="<?php if(isset($valores) && $valores['emailUser']) echo $valores['emailUser'];?>">
										</div>
									</div>
									
								</div>

								<div class="row">
									<div class="col-lg-12">
									<?php if($erros['password'] != '') { ?>
				                        <span class="help-block">
				                            <strong><?php echo $erros['password'];?></strong>
				                        </span>
						            <?php } ?>

									<?php if($erros['password_confirmation'] != '') { ?>
				                        <span class="help-block">
				                            <strong><?php echo $erros['password_confirmation'];?></strong>
				                        </span>
						            <?php } ?>
						        	</div>
									<div class="col-md-6 ">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password" name="password" id="password">
										</div>
									</div>
									<div class="col-mg-6">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Repetir Password" name="password_confirmation" id="password_confirmation">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?php if($erros['telemovelContactos'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['telemovelContactos'];?></strong>
						                        </span>
						                    <?php } ?>
											<input type="text" class="form-control" placeholder="Telemóvel" name="telemovelContactos" id="telemovelContactos" value="<?php if(isset($valores) && $valores['telemovelContactos']) echo $valores['telemovelContactos'];?>">
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-12">
									<?php if($erros['concelhos'] != '') { ?>
				                        <span class="help-block">
				                            <strong><?php echo $erros['concelhos'];?></strong>
				                        </span>
						            <?php } ?>
						        </div>
									<div class="col-md-4 ">
										<div class="form-group">
											<select class="form-control pais select2" name="pais" id="pais">
												<option value="0">País</option>
												<?php foreach ($paises as $pais) { ?>
													<option value="<?php echo $pais->idPais;?>"><?php echo $pais->descricaoPais;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<select class="form-control distritos select2" name="distritos" id="distritos" disabled>
												<option value="0">Distritos</option>
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<select class="form-control concelhos select2" name="concelhos" id="concelhos" disabled>
												<option value="0">Concelhos</option>
											</select>
										</div>
									</div>
								</div>



								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?php if($erros['tiposEventos'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['tiposEventos'];?></strong>
						                        </span>
						                    <?php } ?>
											<select class="form-control" name="tiposEventos[]" id="tiposEventos" multiple='multiple' placeholder="Tipo Eventos Favoritos">
												<?php foreach ($tiposEventos as $tipoEvento) { ?>
													<option value="<?php echo $tipoEvento->idTipoEvento;?>"
														<?php if(isset($valores) && $valores['tiposEventos'] ) 
																foreach ($valores['tiposEventos'] as $tEvento) {
																	if($tEvento == $tipoEvento->idTipoEvento )
																			echo 'selected';
																}?>
														><?php echo $tipoEvento->descricaoTipoEvento;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<?php if($erros['tiposEspetaculos'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['tiposEspetaculos'];?></strong>
						                        </span>
						                    <?php } ?>
											<select class="form-control" name="tiposEspetaculos[]" id="tiposEspetaculos" multiple='multiple' placeholder="Categorias de Espetáculos Favoritas">
												<?php foreach ($tiposEspetaculos as $tipoEspetaculo) { ?>
													<option value="<?php echo $tipoEspetaculo->idTipoEspetaculo;?>"
														<?php if(isset($valores) && $valores['tiposEspetaculos'] ) 
																foreach ($valores['tiposEspetaculos'] as $tEspetaculo) {
																	if($tEspetaculo == $tipoEspetaculo->idTipoEspetaculo )
																			echo 'selected';
																}?>
														><?php echo $tipoEspetaculo->descricaoTipoEspetaculo;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<?php if($erros['verificacaoRegisto'] != '') { ?>
						                        <span class="help-block">
						                            <strong><?php echo $erros['verificacaoRegisto'];?></strong>
						                        </span>
						                    <?php } ?>
						                    <input type="text" id="idQuestao" name="idQuestao" class="form-control" style="display: none;" value="<?php echo $questaoSeguranca->idQuestao?>">
											<input type="text" id="verificacaoRegisto" name="verificacaoRegisto" class="form-control" placeholder="É um robot? Quanto é: <?php echo $questaoSeguranca->valor1; ?> + <?php echo $questaoSeguranca->valor2;?> =?">
										</div>
									</div>
								</div>
								<!-- /row -->
								<div><input type="submit" class="btn_1" value="Registar" id="registarFa"></div>

								<?php } ?>
							</form>
						</div>
						<!-- /box_form -->
					</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /hero_register -->


@stop



@section('scriptsFooter')

<script src="{!! asset("libs/js/jquery-2.1.1.min.js") !!}"></script>
<script src="{!! asset("libs/js/bootstrap.min.js") !!}"></script>
<script src="{!! asset("libs/js/jquery-ui.js") !!}"></script>
<script src="{!! asset("libs/js/select2.full.js") !!}" type="text/javascript"></script>
<script src="{!! asset("libs/js/chosen.jquery.min.js") !!}"></script>



<script>


	$(document).ready(function(){
		$(".concelhos").select2();
		$(".distritos").select2();
		$(".pais").select2();
		$('#tiposEspetaculos').select2();
		$('#tiposEventos').select2();

		if($('#pais').val() != 0)
            $('#distritos').removeAttr("disabled");
        else
            $('#distritos').attr("disabled", "disabled");
        
        if($('#distritos').val() != 0)
            $('#concelhos').removeAttr("disabled");
        else
            $('#concelhos').attr("disabled", "disabled");
        

        $('#distritos').change(function(){
	        if($('#distritos').val() != 0)
	            $('#concelhos').removeAttr("disabled");
	        else
	            $('#concelhos').attr("disabled", "disabled");     
	    });  

	});


$(document.body).on("change","#pais",function(){
 
 $('#concelhos').attr("disabled", "disabled");
 $('#distritos').attr("disabled", "disabled");
 
 var novoIdPais = this.value;

 //console.log(novoIdPais);
 //Pedido Ajax:
 $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
 });
  var url = 'getDistritos'; 
  var data = {
      idPais: novoIdPais,
  };

  $.ajax({
      url: url,
      type: 'POST',
      data: data,
      dataType: 'JSON',
      success: function (data) {
          console.log('OK...');
          //$(".choose-distrito").select2("destroy");
          $("#distritos").html("");
          $("#concelhos").html("");
          console.log(data[0].id);
          if(data[0].id == 0){ 
          	getConcelhos();
          	$('#concelhos').attr("disabled", "disabled");
          }
          else {
          	getConcelhos();
          	$('#concelhos').attr("disabled", "disabled");
          }
          $("#distritos").select2({data:data,});
          $('#distritos').removeAttr("disabled");
          //$('#alertaGravacao').append('<div id="alertdiv" class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span>Tipo Processo gravado com sucesso</span></div>');
          //$("#btnActivarClie"+idUtilizador).hide();
      },
      error:function(data){
          console.log('Not OK...');
          $('#alertaGravacao').append('<div id="alertdiv" class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>Erro de acesso ao servidor, verifique se tem conectividade internet...</span></div>');
      }
  });
});


$(document.body).on("change","#distritos",function(){

 $('#concelhos').attr("disabled", "disabled");

 var novoIdDistrito = this.value;

 $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
 });
  var url = 'getConcelhos'; 
  var data = {
      idDistrito: novoIdDistrito,
  };
  $.ajax({
      url: url,
      type: 'POST',
      data: data,
      dataType: 'JSON',
      success: function (data) {
          console.log('OK...');
          $("#concelhos").html("");
          $("#concelhos").select2({data:data,});
          $('#concelhos').removeAttr("disabled");
          //$('#alertaGravacao').append('<div id="alertdiv" class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span>Tipo Processo gravado com sucesso</span></div>');
          //$("#btnActivarClie"+idUtilizador).hide();
      },
      error:function(data){
          console.log('Not OK...');
          $('#alertaGravacao').append('<div id="alertdiv" class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>Erro de acesso ao servidor, verifique se tem conectividade internet...</span></div>');
      }
  });

  });

	
	function getConcelhos(){

 	var novoIdDistrito = $('#distritos').val();

	 $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
	 });
	  var url = 'getConcelhos'; 
	  var data = {
	      idDistrito: novoIdDistrito,
	  };
	  $.ajax({
	      url: url,
	      type: 'POST',
	      data: data,
	      dataType: 'JSON',
	      success: function (data) {
	          console.log('OK...');
	          $("#concelhos").html("");
	          $("#concelhos").select2({data:data,});
	          $('#concelhos').removeAttr("disabled");
	          //$('#alertaGravacao').append('<div id="alertdiv" class="alert alert-success"><a class="close" data-dismiss="alert">×</a><span>Tipo Processo gravado com sucesso</span></div>');
	          //$("#btnActivarClie"+idUtilizador).hide();
	      },
	      error:function(data){
	          console.log('Not OK...');
	          $('#alertaGravacao').append('<div id="alertdiv" class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>Erro de acesso ao servidor, verifique se tem conectividade internet...</span></div>');
	      }
	  });
	}

</script>


@stop

@extends('frontend.template.templateSemSlider')



	@section('scriptsHeader')

	@stop

	@section('conteudoPagina')
	<div id="breadcrumb">
		<div class="container">
			<ul>
				<li><a href="{{ URL::action('HomeController@index')}}">Página Principal</a></li>
				<li>Contactos</li>
			</ul>
		</div>
	</div>
		<!-- /breadcrumb -->

		
	<div class=" col-lg-8 col-md-8 ml-auto">
		<div class="box_general">
			<h3>Contacta-nos</h3>
			<p>
				Tens alguma dúvida? Nós respondemos de imediato.
			</p>
			<?php if($erros['errosTeste'] == 3) { ?>
               <div class="alert alert-success">
               	A sua questão foi enviada com sucesso. Receberá uma resposta em breve! Obrigado.
               </div>
            <?php } else { ?>

			<div>
				<div id="message-contact"></div>
				<form method="post" action="{{ URL::action('HomeController@saveFormContacto') }}" id="contactform">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<?php if($erros['tipoForm'] != '') { ?>
			                        <span class="help-block">
			                            <strong><?php echo $erros['tipoForm'];?></strong>
			                        </span>
			                    <?php } ?>
			                    <select class="form-control" name="tipoForm" id="tipoForm">
									<option value="1" <?php if($tipoForm == 1) echo 'selected'; ?>>Dúvida de Utilização</option>
									<option value="2" <?php if($tipoForm == 2) echo 'selected'; ?>>Financeiro</option>
									<option value="3" <?php if($tipoForm == 3) echo 'selected'; ?>>Registo</option>
									<option value="4" <?php if($tipoForm == 4) echo 'selected'; ?>>Outro</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<?php if($erros['nome'] != '') { ?>
			                        <span class="help-block">
			                            <strong><?php echo $erros['nome'];?></strong>
			                        </span>
			                    <?php } ?>
								<input type="text" class="form-control" id="nome" name="nome" value="<?php if(isset($valores)) echo $valores['nome'];?>" placeholder="Teu Nome">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<?php if($erros['email'] != '') { ?>
			                        <span class="help-block">
			                            <strong><?php echo $erros['email'];?></strong>
			                        </span>
			                    <?php } ?>
								<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($valores)) echo $valores['email'];?>">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<?php if($erros['telefone'] != '') { ?>
			                        <span class="help-block">
			                            <strong><?php echo $erros['telefone'];?></strong>
			                        </span>
			                    <?php } ?>
								<input type="text" id="telefone" name="telefone" class="form-control" placeholder="Contacto Telefónico" value="<?php if(isset($valores)) echo $valores['telefone'];?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<?php if($erros['mensagem'] != '') { ?>
			                        <span class="help-block">
			                            <strong><?php echo $erros['mensagem'];?></strong>
			                        </span>
			                    <?php } ?>
								<textarea rows="5" id="mensagem" name="mensagem" class="form-control" style="height:100px;" placeholder="Dúvida"><?php if(isset($valores)) echo $valores['mensagem'];?></textarea>
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

					<input type="submit" value="Enviar" class="btn_1 add_top_20" id="submit-contact">
				</form>
			</div>
			<?php } ?>
			<!-- /col -->
		</div>
	</div>



		@stop



@section('scriptsFooter')


@stop

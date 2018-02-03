@extends('frontend.template.template')



    @section('scriptsHeader')
    <style>
    .modal {
        display:none; 
    }
</style>
    @stop



    @section('conteudoPagina')

    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title">
                <h2>Destaques</h2>
                <p>Encontra o artista ideal para o teu espetáculo.</p>
            </div>
            <div class="row">

            <?php 
            if(count($artistasHome) == 0){ ?>
                <div class="alert alert-warning" style="width: 100%; text-align: center;">Ainda não existem registos de artistas. Registe-se já!</div>
            <?php } 
            else{
                foreach ($artistasHome as $artistaHome) {
                    $idArtista = $artistaHome->idAnuncio;
                    $urlImagemArtista = $artistaHome->urlImagemAnuncio;
                    $categorias = $artistaHome->categoriasArtista;
                    $zonasAtuacao = $artistaHome->zonasAtuacao;
                    $tituloAnuncio = $artistaHome->descricao;
                    $textoAnuncio = $artistaHome->textoAnuncio;
                    $feedback = $artistaHome->feedbackGeral;
                    $numComentarios = $artistaHome->quantosComentarios;
                    $numVisualizacoes = $artistaHome->nrVisualizacoes;
                    if(strlen($textoAnuncio>70)){
                        $textoAnuncioFinal = substr($textoAnuncio, 0, 70)."...";
                    }
                    else{
                        $textoAnuncioFinal = $textoAnuncio;
                    }
                    if(Auth::user()->id > 0){
                        $segueArtista = $artistaHome->idQuemGostou;
                        if($segueArtista){
                            $temSeguidoArtista = 1;
                        }
                        else{
                            $temSeguidoArtista = 0;
                        }
                    }
                    else {
                        $temSeguidoArtista = 0;
                    }

                 ?>
                
                <div class="col-lg-4 col-md-6">
                    <div class="box_list home">
                        <?php if($temSeguidoArtista == 0) { ?>
                            <a href="#0" data-toggle="tooltip" data-placement="top" title="Adicionar à WishList" class="wish_bt"></a>
                        <?php } ?>
                        <figure>

                            <a href="{{ URL::action('ArtistasController@show', [$idArtista]) }}">
                                <img src="<?php echo url('artistas/'.$urlImagemArtista);?>" class="img-fluid" alt=""></a>
                            <div class="preview"><span>Ver mais</span></div>
                        </figure>
                        <div class="wrapper">

                            <?php $i=0; foreach ($categorias as $categoria){ ?>
                                <small><?php if($i>3) echo $categoria->descricaoTipoEspetaculo;?></small> 
                            <?php $i++; } ?>

                            <?php $i=0; foreach ($zonasAtuacao as $zona){ ?>
                                <small><?php if($i>3) echo $zona->descricaoConcelho;?></small> 
                            <?php $i++; } ?>


                            <h3><?php echo $tituloAnuncio; ?></h3>
                            <p><?php echo $textoAnuncioFinal; ?></p>
                            <span class="rating">
                                <?php $feedbackArredondado = round($feedback);
                                        
                                    for($j = 0; $j<$feedbackArredondado; $j++){ ?>
                                        <i class="icon_star voted"></i>
                                    <?php } ?>
                                    <?php $restantes = 5 - $feedbackArredondado; 
                                        for($k = 0; $k<$restantes; $k++ ){ ?>
                                        <i class="icon_star"></i>
                                    <?php }?>
                                

                                <small>(<?php echo $numComentarios;?>)</small></span>
                            <!--<a href="#0" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>-->
                        </div>
                        <ul>
                            <li><i class="icon-eye-7"></i> <?php echo $numVisualizacoes; ?> Visualizações</li>
                            <li><a href="{{ URL::action('ArtistasController@show', [$idArtista]) }}">Ver Página</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
                
            <!-- /row -->
            <p class="text-center add_top_30"><a href="{{ URL::action('ArtistasController@index') }}" class="btn_1 medium">Todos Artistas</a></p>
        </div>
        <!-- /container -->
        <?php } ?>
    </div>


    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title">
                <h2>Últimos espetáculos confirmados pela plataforma</h2>
                <p>Aqui terás acesso em tempo real aos últimos espetáculos que foram fechados com artistas da plataforma. Está atento!</p>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">
                <?php

                if(count($ultimosEspetaculos) == 0){ ?>
                <div class="alert alert-warning" style="width: 100%; text-align: center;">Ainda não existem espetáculos confirmados. Registe-se já e este espaço será seu!</div>
            <?php } 
            else {
                foreach ($ultimosEspetaculos as $ultimoEspetaculo) {
                    $confirmacoesPresencas = $ultimoEspetaculo->nrPessoasInscritas;
                    $dataInicioEvento = $ultimoEspetaculo->dataInicioEvento;
                    $diaInicio = date('d',strtotime($dataInicioEvento));
                    $mesInicio = date('m',strtotime($dataInicioEvento));
                    $horasInicio = date('H',strtotime($dataInicioEvento));
                    $minutosInicio = date('i',strtotime($dataInicioEvento));
                    if($mesInicio == 1){
                        $descricaoMes = 'Janeiro';
                    }
                    else if($mesInicio == 2){
                        $descricaoMes = 'Fevereiro';
                    }
                    else if($mesInicio == 3){
                        $descricaoMes = 'Março';
                    }
                    else if($mesInicio == 4){
                        $descricaoMes = 'Abril';
                    }
                    else if($mesInicio == 5){
                        $descricaoMes = 'Maio';
                    }
                    else if($mesInicio == 6){
                        $descricaoMes = 'Junho';
                    }
                    else if($mesInicio == 7){
                        $descricaoMes = 'Julho';
                    }
                    else if($mesInicio == 8){
                        $descricaoMes = 'Agosto';
                    }
                    else if($mesInicio == 9){
                        $descricaoMes = 'Setembro';
                    }
                    else if($mesInicio == 10){
                        $descricaoMes = 'Outubro';
                    }
                    else if($mesInicio == 11){
                        $descricaoMes = 'Novembro';
                    }
                    else if($mesInicio == 12){
                        $descricaoMes = 'Dezembro';
                    }

                    $anoInicio = date('Y',strtotime($dataInicioEvento));
                    $descricaoLocal = $ultimoEspetaculo->descricaoLocal; 
                    $localidade = $ultimoEspetaculo->localidade;
                    $dataFormatada = $diaInicio." de ".$descricaoMes." - ".$horasInicio.":".$minutosInicio;
                    $imagemEvento = $ultimoEspetaculo->urlImagemEvento;

                ?>
                <div class="item">
                    <a href="#">
                        <div class="views"><i class="fa fa-ticket"></i>33</div>
                        <div class="title">
                            <h4><?php echo $descricaoLocal;?> <em><?php echo $localidade;?></em> <em style="font-size: 11px; padding-top: 2px;"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $dataFormatada;?></em> </h4>
                        </div><img src="<?php echo url("espetaculos/".$imagemEvento); ?>" alt="">
                    </a>
                </div>


                <?php } ?>
                <?php } ?>
            
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /white_bg -->




    <div class="container margin_120_95">
        <div class="main_title">
            <h2>Como funciona a plataforma?</h2>
            <p>A plataforma tem como objetivo potenciar os artistas e bandas emergentes, juntando todos pela música!</p>
        </div>
        <div class="row add_bottom_30">
            <div class="col-lg-4">
                <div class="box_feat" id="icon_1">
                    <span></span>
                    <h3>És um organizador de eventos?</h3>
                    <p>Estás à procura de alguém para um concerto no teu estabelecimento ou para um evento? Queres encontrar um artista novo, com potencial?</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_2">
                    <span></span>
                    <h3>És um artista que pretende potenciar o seu currículo e ganhar novos espetáculos?</h3>
                    <p>Aqui podes divulgar os teus serviços, gerir o teu calendário, a tua página profissional, e muito mais!!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_feat" id="icon_3">
                    <h3>Frequentas um café, um local onde existem eventos musicais?</h3>
                    <p>Se queres saber em primeira mão o que poderás ouvir no local favorito onde frequentas, este é o teu espaço! Conhece novos talentos musicais!</p>
                </div>
            </div>
        </div>
        <!-- /row -->
        <!--<p class="text-center"><a href="#" class="btn_1 medium"><strong>É grátis!</strong> Regista-te</a></p>-->

    </div>
    <!-- /container -->

    

    <div id="app_section">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <p><img src="libs/img/musicIcon.png" alt="" class="img-fluid" width="500" height="433"></p>
                </div>
                <div class="col-md-6">
                    <small>Wote</small>
                    <h3>De que estás à espera? <strong>É GRÁTIS!!</strong>. </h3>
                    <p class="lead">Entra no mundo da música!</p>
                    <div class="app_buttons wow" data-wow-offset="100">
                        <!-- icon seta - alargada efeito 3,3,1-->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                        <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                        <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
                    </svg>
                        <a href="{{ URL::action('RegisterController@show', ['artista']) }}" class="fadeIn" class="btn btn-success" style="font-size: 35px;"></strong> Registo</a></a>
                        
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /app_section -->



@stop



@section('scriptsFooter')





@stop

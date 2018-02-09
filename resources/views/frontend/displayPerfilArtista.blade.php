@extends('frontend.template.templateSemSlider')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')

    <div class="container">
        <div class="row"> 
            <!-- FONTS --><!-- Roboto, Yellowtail, and Montserrat -->
            <link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto:300,400|Yellowtail" rel="stylesheet">
            <!-- PAGE STUFF -->
            
            <div class="rela-block mycontainer mybody">
                <div class="rela-block profile-card">
                    <div class="profile-pic" id="profile_pic"></div>
                    <div class="rela-block profile-name-container">
                        <div class="rela-block user-name" id="user_name">{{$artista->name}}</div>
                        <div class="rela-block user-desc" id="user_description">{{$perfil->descricao}}</div>
                    </div>
                    <div class="rela-block profile-card-stats">
                        <div class="floated profile-stat works" id="num_works">28<br></div>
                        <div class="floated profile-stat followers" id="num_followers">112<br></div>
                        <div class="floated profile-stat following" id="num_following">245<br></div>
                    </div>
                </div>

                <style>

                .rela-block {
                  display: block;
                  position: relative;
                  margin: auto;
                  top: ;
                  left: ;
                  right: ;
                  bottom: ;
                }

                .floated {
                  display: inline-block;
                  position: relative;
                  margin: false;
                  top: ;
                  left: ;
                  right: ;
                  bottom: ;
                  float: left;
                }

                mybody {
                  font-family: "Roboto";
                  font-size: 18px;
                  letter-spacing: 2px;
                  font-weight: 400;
                  line-height: 24px;
                }

                .mycontainer {
                  z-index: 1;
                  width: 92%;
                  max-width: 1126px;
                  margin: 30px auto;
                  padding: 10px 0;
                }
                .mycontainer2 {
                  z-index: 1;
                  width: 92%;
                  max-width: 1126px;
                  margin: -10px auto;
                  padding: 0px 0;
                }
                .profile-card {
                  width: calc(100% - 40px);
                  padding-top: 100px;
                  margin: 70px auto 30px;
                  background-color: #fff;
                  box-shadow: 0 2px 6px -2px rgba(0,0,0,0.26);
                }
                .profile-card2 {
                  width: 89%;
                  padding-top: 20px;
                  margin: 0px auto 30px;
                  background-color: #fff;
                  box-shadow: 0 2px 6px -2px rgba(0,0,0,0.26);
                }
                .profile-pic {
                  display: false;
                  position: absolute;
                  margin: false;
                  top: -90px;
                  left: 50%;
                  right: false;
                  bottom: false;
                  -webkit-transform: translateX(-50%);
                          transform: translateX(-50%);
                  height: 180px;
                  width: 180px;
                  border: 10px solid #fff;
                  border-radius: 100%;
                  background: url("<?php echo $profilePic ?>") center no-repeat;
                  background-size: cover;
                }
                .profile-name-container {
                  margin: 0 auto 10px;
                  padding: 10px;
                  text-align: center;
                }
                .user-name {
                  font-family: "Montserrat";
                  font-size: 24px;
                  letter-spacing: 3px;
                  font-weight: 400;
                  line-height: 30px;
                  margin-bottom: 12px;
                }
                .user-desc {
                  letter-spacing: 1px;
                  color: #999;
                }
                .profile-card-stats {
                  height: 75px;
                  padding: 10px 0px;
                  text-align: center;
                  overflow: hidden;
                }
                .profile-stat {
                  height: 100%;
                  width: 33.3333%;
                }
                .profile-stat:after {
                  color: #999;
                }
                .works::after {
                  content: "works";
                }
                .followers::after {
                  content: "followers";
                }
                .following::after {
                  content: "following";
                }
                </style>

            </div>

            <div class="profile-card2 mycontainer2 row mybody">
                <div  class="col-lg-12">
                        <p allign="left">Obs:            {{$perfil->observacoes}}</p>
                        <p>Estilo Musical: {{$perfil->estiloPrincipal}}</p>

                        <p>Preço Hora:       {{$artista->precoHora}}</p>
                        <p>Preço Dia:        {{$artista->precoDia}}</p>
                        <p>Preço Deslocaçao: {{$artista->precoDeslocacao}}</p>
                        <p>Preco Sugerido:   {{$artista->precoMinimoAtuacao}}</p>
                        <p>Data Registo:     {{$artista->dataRegisto}}</p>

                        <p>Morada:        {{$artista->morada}}</p>
                        <p>Codigo Postal: {{$artista->codigoPostal1}}</p>
                        <p>Codigo Postal: {{$artista->codigoPostal2}}</p>
                        <p>Codigo Postal: {{$artista->codigoPostalDesignacao}}</p>
                        <p>Cidade:        {{$artista->descricaoConcelho}}, {{$artista->descricaoDistrito}}</p>
                </div>
            </div>
        </div>

    </div>

</head>
  <body>
    <div class="container">
      <!-- Responsive calendar - START -->
      <div class="responsive-calendar">
        <div class="controls">
            <a class="pull-left" data-go="prev"><div class="btn btn-primary">Prev</div></a>
            <h4><span data-head-year></span> <span data-head-month></span></h4>
            <a class="pull-right" data-go="next"><div class="btn btn-primary">Next</div></a>
        </div><hr/>
        <div class="day-headers">
          <div class="day header">Mon</div>
          <div class="day header">Tue</div>
          <div class="day header">Wed</div>
          <div class="day header">Thu</div>
          <div class="day header">Fri</div>
          <div class="day header">Sat</div>
          <div class="day header">Sun</div>
        </div>
        <div class="days" data-group="days">
          
        </div>
      </div>
      <!-- Responsive calendar - END -->
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/responsive-calendar.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $(".responsive-calendar").responsiveCalendar({
          time: '2013-05',
          events: {
            "2013-04-30": {"number": 5, "url": "http://w3widgets.com/responsive-slider"},
            "2013-04-26": {"number": 1, "url": "http://w3widgets.com"}, 
            "2013-05-03":{"number": 1}, 
            "2013-06-12": {}}
        });
      });
    </script>
    

@stop

@section('scriptsFooter')


@stop
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

                    <div class="profile-pic" id="profile-pic"></div>

                    <div class="rela-block profile-name-container">
                        <div class="rela-block user-name" id="user_name">{{$evento->tituloEvento}}</div>
                        <div class="rela-block user-desc" id="user_description">{{$evento->descricaoEvento}}</div>
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
                  background: url("<?php echo $evento->urlImagemEvento ?>") center no-repeat;
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
                        <p>Test: xD</p>
                </div>
            </div>
        </div>

    </div>

</head>

@stop

@section('scriptsFooter')


@stop
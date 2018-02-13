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

                    <?php if(Auth::user() && $pageId == Auth::user()->id){?>

                    <div class="profile-pic" style="cursor: pointer;" id="profile-pic"></div>
                    <form action="{{ URL::to('upload', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data" name="profile-pic-form" id="profile-pic-form">
                        <input type="hidden" value="default" name="picture" id="picture">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                    </form>
                    <script>
                      var fileSelector = $('<input type="file" name="file" id="file" accept="image/*">');
                      
                      $("#profile-pic").click(function() {
                          fileSelector.click();
                          return false;
                      });

                      fileSelector.on('change', function () {
                          var fileReader = new FileReader();
                          fileReader.onload = function () {
                            //document.write("xD");
                            var data = fileReader.result;  // file data in Base64 format
                            $('input#picture').val(data);
                            $('form#profile-pic-form').submit();
                          };
                          var file = fileSelector.val();
                          //document.write(fileSelector[0].files[0]);
                          fileReader.readAsDataURL(fileSelector[0].files[0]);
                          return false;
                      });
                    </script>

              <?php } else { ?>
                    
                    <div class="profile-pic" id="profile-pic"></div>

              <?php } ?>

                    

                    <div class="rela-block profile-name-container">
                        <div class="rela-block user-name" id="user_name">{{$fa->name}}</div>
                        <div class="rela-block user-desc" id="user_description">{{$perfil->descricao}}</div>
                    </div>
                    <div class="rela-block profile-card-stats">
                        <div class="floated profile-stat estilo" id="id_estilo">{{$perfil->estiloPrincipal}}<br></div>
                        <div class="floated profile-stat nomeartistico" id="id_nomeartistico">{{$fa->dataRegisto}}<br></div>
                        <div class="floated profile-stat seguidores" id="id_seguidores">{{$perfil->nrSeguidoresTotal}}<br></div>
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
                .estilo::after {
                  content: "Estilo Musical Preferido";
                }
                .nomeartistico::after {
                  content: "Data Registo";
                }
                .seguidores::after {
                  content: "Seguindo";
                }
                </style>

            </div>

            <div class="profile-card2 mycontainer2 row mybody">
                <div class="col-lg-12">
                    <div class="panel-body">
                        <div class="row">
                
                            <div class=" col-md-12 col-lg-12 "> 
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td>Email:</td>
                                            <td><a href="mailto:{{$fa->email}}">{{$fa->email}}</a></td>
                                        </tr>
                                            <td>Telemóvel:</td>
                                            <td>{{$fa->telemovel}}</td> 
                                        </tr>
                                        </tr>
                                            <td>Morada:</td>
                                            <td>{{$fa->morada}}</td> 
                                        </tr>
                                        </tr>
                                            <td>Código Postal:</td>
                                            <td>{{$fa->codigoPostal1}} - {{$fa->codigoPostal2}}, {{$fa->codigoPostalDesignacao}}</td> 
                                        </tr>
                                        </tr>
                                            <td>Cidade:</td>
                                            <td>{{$fa->descricaoConcelho}}, {{$fa->descricaoDistrito}}</td> 
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <style>
                      .user-row {
                          margin-bottom: 14px;
                      }

                      .user-row:last-child {
                          margin-bottom: 0;
                      }

                      .dropdown-user {
                          margin: 13px 0;
                          padding: 5px;
                          height: 100%;
                      }

                      .dropdown-user:hover {
                          cursor: pointer;
                      }

                      .table-user-information > tbody > tr {
                          border-top: 1px solid rgb(221, 221, 221);
                      }

                      .table-user-information > tbody > tr:first-child {
                          border-top: 0;
                      }


                      .table-user-information > tbody > tr > td {
                          border-top: 0;
                      }
                      .toppad
                      {margin-top:20px;
                      }
                    </style>
            </div>
        </div>

    </div>

</head>
  <body>
    <div class="container margin_120_95">
      <!-- Responsive calendar - START -->
      <script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: '2018-02-12',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'Evento 1',
          url: '\evento\1',
          start: '2018-02-01',
        },
        {
          title: 'Evento 2 longo',
          url: '\evento\1',
          start: '2018-02-07',
          end: '2018-02-10'
        },
        {
          title: 'evento3',
          start: '2018-02-11',
          url: '\evento\1',
          end: '2018-02-13'
        },
        {
          title: 'evento4',
          start: '2018-02-12T10:30:00',
          url: '\evento\1',
          end: '2018-02-12T12:30:00'
        },
        {
          title: 'evento5',
          url: '\evento\1',
          start: '2018-02-12T12:00:00'
        },
        {
          title: 'evento6',
          url: '\evento\1',
          start: '2018-02-12T14:30:00'
        },
        {
          title: 'evento7',
          url: '\evento\1',
          start: '2018-02-12T17:30:00'
        },
        {
          title: 'evento8',
          url: '\evento\1',
          start: '2018-02-12T20:00:00'
        },
        {
          title: 'evento9',
          url: '\evento\1',
          start: '2018-02-13T07:00:00'
        },
        {
          title: 'evento10',
          url: '\evento\1',
          start: '2018-02-28'
        }
      ]
    });

  });

    </script>

    <div id='calendar'></div>
    <!-- Responsive calendar - END -->

</body>

@stop

@section('scriptsFooter')


@stop
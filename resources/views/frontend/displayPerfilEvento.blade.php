@extends('frontend.template.template')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')

<div class="container margin_120_95">
        <div class="main_title">
            <h2><a href= '/evento/{{$evento->idEvento}}' title="">{{$evento->tituloEvento}}</a></h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <nav id="menu" class="main-menu">
                        <ul>
                            <li>
                                <span><a href="#0">Perfil</a></span>
                            </li>
                            <li>
                                <span><a href="#0">Sobre</a></span>
                            </li>
                            <li>
                                <span><a href="#0">FAQs</a></span>
                            </li>
                            <li>
                                <span><a href="#0">Fotografias</a></span>
                            </li>
                            <li>
                                <span><a href="#0">Vídeos</a></span>
                            </li>
                        </ul>
                    </nav>
                    <!-- /main-menu -->
                </div>

                <div class="col-lg-6 col-6">
                    <nav id="menu" class="main-menu">
                        <ul>
                            <li>
                                <span><a href="#0">Enviar mensagem</a></span>
                            </li>
                            <li>
                                <span><a href="#0">Adicionar aos favoritos</a></span>
                            </li>
                        </ul>
                    </nav>
                    <!-- /main-menu -->
                </div>
            </div>
        </div>

        <div class="row add_bottom_30">
            <div class="col-lg-9">
                <div class="box_feat">
                    
                </div>
            </div>
            <div class="col-lg-3">
                <div class="box_feat">
                    <span></span>
                    <h3>Agenda</h3>
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
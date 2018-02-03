@extends('frontend.template.template')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')

    <div class="container">

        <hgroup class="mb20">

            <h1>Search Results</h1>
            <h2 class="lead"><strong class="text-danger">{{count($search_artistas) + count($search_organizadores) + count($search_eventos)}}</strong> results were found for the search for <strong class="text-danger">{{$search_query}}</strong></h2>                               
        </hgroup>
        
        <section class="col-xs-12 col-sm-6 col-md-12">

                @foreach($search_artistas as $artista)
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="Lorem ipsum" class="thumbnail"><img src="" alt="Lorem ipsum" /></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Cao</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href= '/artista/{{$artista->id}}'  title="">{{$artista->nome}}</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
                @endforeach

                @foreach($search_organizadores as $organizador)
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="Lorem ipsum" class="thumbnail"><img src="" alt="Lorem ipsum" /></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Cao</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href= '/organizador/{{$organizador->id}}'  title="">{{$organizador->nome}}</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
                @endforeach

                @foreach($search_eventos as $evento)
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="Lorem ipsum" class="thumbnail"><img src="" alt="Lorem ipsum" /></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Cao</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href= '/evento/{{$evento->idEvento}}'  title="">{{$evento->tituloEvento}}</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>                        
                        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
                @endforeach
        </section>
    </div>


@stop



@section('scriptsFooter')


@stop

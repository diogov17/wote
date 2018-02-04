@extends('frontend.template.templateSemSlider')



    @section('scriptsHeader')

    @stop



    @section('conteudoPagina')

    <div align="center" class="wrap">
        <div class="logo">
            <br/><br/><br/>
            <p style="font-size:36px;"><strong>{{ trans('messages.404') }}</strong></p>
            <br/><br/> 
            <img class="center" src="{{ asset('img/404.png') }}">
            <br/><br/><br/><br/>
        </div>  
    </div>
    
    @stop


    @section('scriptsFooter')


    @stop

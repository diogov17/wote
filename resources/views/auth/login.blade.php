@extends('frontend.template.templateSemSlider')



    @section('scriptsHeader')
    <style>
    </style> 
    @stop



    @section('conteudoPagina')

        <div class="bg_color_2">
            <div class="container margin_60_35">
                <div id="login-2">
                    <h1>Autentica-te no WOTE!</h1>
                     <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="box_form clearfix">
                            <div class="box_login">
                                <a href="#0" class="social_bt facebook">Login com Facebook</a>
                                <a href="#0" disabled class="social_bt google">Login Google (EM BREVE)</a>
                                <a href="#0" disabled class="social_bt linkedin">Login Linkedin (EM BREVE)</a>
                            </div>
                            <div class="box_login last">
                                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Email</label>
                                    <div class="col-lg-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                       
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-lg-12">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        <a href="{{ URL::action('RegisterController@recuperarPassword') }}" class="forgot"><small>Esqueceste-te da password?</small></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input class="btn_1" type="submit" value="Login">
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="text-center link_bright">Ainda não tens conta WOTE? Regista-te já como: </p>
                         <p class="text-center link_bright" style="line-height: 0px;"><strong><a href="{{ URL::action('RegisterController@show', ['fa'])}}">Fã</a></strong> </p>
                         <p class="text-center link_bright" style="line-height: 0px;"><strong><a href="{{ URL::action('RegisterController@show', ['artista'])}}">Artista</a></strong></p>
                         <p class="text-center link_bright" style="line-height: 0px;"><strong><a href="{{ URL::action('RegisterController@show', ['organizador'])}}">Organizador de Eventos</a></strong></p>
                  
                </div>
                <!-- /login -->
            </div>
        </div>



    @stop



@section('scriptsFooter')





@stop


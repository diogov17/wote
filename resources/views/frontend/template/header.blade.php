<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>{{ trans('messages.Header') }}</title>
<meta name="description" content="{{ trans('messages.WoteHeaderDescription') }}">
<meta name="author" content="Wote">

<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('libs/images/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('libs/images/apple-icon-60x60.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('libs/images/apple-icon-72x72.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('libs/images/apple-icon-76x76.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('libs/images/apple-icon-114x114.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('libs/images/apple-icon-120x120.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('libs/images/apple-icon-144x144.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('libs/images/apple-icon-152x152.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('libs/images/apple-icon-180x180.png') }}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('libs/images/android-icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('libs/images/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('libs/images/favicon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('libs/images/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('libs/images/manifest.json') }}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{ asset('libs/images/ms-icon-144x144.png') }}">
<meta name="theme-color" content="#ffffff">


<link rel="shortcut icon" href="{{ asset('libs/images/favicon.ico') }}" type="image/x-icon">

<meta property="og:title" content="{{ trans('messages.Header') }}" />

<meta property="og:image" content="{{ asset('libs/images/logo.png') }}" />

<meta property="og:site_name" content="wote.pt" />

<meta property="og:description" content="{{ trans('messages.WoteHeaderShortDescription') }}" />



<!-- Não retirar estes links, são as referências a frameworks externas para o funcionamento integral do design elaborado -->
<link href="{{ asset('libs/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('libs/css/menu.css') }}" rel="stylesheet">
<link href="{{ asset('libs/css/vendors.css') }}" rel="stylesheet">
<link href="{{ asset('libs/css/icon_fonts/css/all_icons_min.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Se quiserem mudar CSS por favor colocar neste ficheiro para ser importado por toda a plataforma -->
<link href="{{ asset('libs/css/custom.css') }}" rel="stylesheet">

<script src="{{ asset('libs/js/jquery-2.2.4.min.js') }}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<style>
.content{
	background-image: url(<?php echo asset('libs/img/backgroundWote.jpg') ?>);
	background-attachment:fixed; 
	background-repeat: no-repeat;
	background-size: cover;
}

.formPesquisaHome {
	margin-top:59px;
}
.descricaoHome{
	margin-top:10px;
}

@media (max-width: 991px) {
    .formPesquisaHome {
		margin-top:0px !important;
	}
	.descricaoHome{
		margin-top:2px !important;
	}

}
</style>

@yield('scriptsHeader')

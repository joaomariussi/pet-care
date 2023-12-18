<head>
    <title>Cassul Distribuidora | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Cassul Distribuidora">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="@yield('description')">
    <meta name="theme-color" content="#f36e4a"/>
    <meta name="language" content="pt-br">

    <meta property="og:title" content="Cassul Distribuidora | @yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="Cassul Distribuidora">
    <meta property="og:image" content="{{asset('images/logo-orange.png')}}">

    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <!-- favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.webp')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/apple-icon/apple-icon-57.webp')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-icon/apple-icon-72.webp')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-icon/apple-icon-114.webp')}}">

    <!-- style sheets and font icons  -->
    <link rel="manifest" href="{{asset("manifest.json")}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/site/font-icons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/site/theme-vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/site/style.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset(mix('css/site/responsive.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/site/components.css')}}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
</head>

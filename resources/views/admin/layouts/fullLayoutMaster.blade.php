<!DOCTYPE html>
{{-- A variável pageConfigs passa para a função updatePageConfig do Helper para atualizar a configuração da página  --}}
@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
    // variável confiData array layoutClasses no arquivo Helper.php.
      $configData = \App\Helpers\helpers::applClasses();
@endphp

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Pet Care</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    {{-- Include core + vendor Styles --}}
    @include('admin.panels.styles')

    @include('admin.panels.cores')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout 1-column navbar-sticky {{$configData['bodyCustomClass']}} footer-static blank-page
  @if($configData['theme'] === 'light'){{'light-layout'}} @endif" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->

{{-- scripts --}}
@include('admin.panels.scripts')
</body>
<!-- END: Body-->
</html>

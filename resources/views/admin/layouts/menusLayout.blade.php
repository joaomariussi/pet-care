@php use App\Helpers\helpers; @endphp
    <!DOCTYPE html>

{{-- A variável pageConfigs passa para a função updatePageConfig do Helper para atualizar a configuração da página  --}}
@isset($pageConfigs)
    {!! helpers::updatePageConfig($pageConfigs) !!}
@endisset

@php

    // variável confiData array layoutClasses no arquivo Helper.php.
    $configData = helpers::applClasses();
@endphp

<html class="loading"
      lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif">

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

@if(!empty($configData['mainLayoutType']) && isset($configData['mainLayoutType']))
    @include(($configData['mainLayoutType'] === 'horizontal-menu') ? 'admin.layouts.horizontalLayoutMaster':'admin.layouts.verticalLayoutMaster')
@else
    {{-- se mainLaoutType estiver vazio ou não estiver definido, sua impressão abaixo da linha --}}
    <h1>{{'mainLayoutType Option is empty in config custom.php file.'}}</h1>
@endif
</html>

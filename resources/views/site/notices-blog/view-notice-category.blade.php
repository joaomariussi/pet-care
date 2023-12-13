@extends('site.includes.base-layout')

@section('title', 'Categoria')

@section('content')
    <header>
        <nav class="navbar navbar-expand-lg bg-gradient-dark-slate-blue navbar-light bg-transparent border-bottom border-color-black-transparent header-light fixed-top top-space header-reverse-scroll">
            <div class="container nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto sm-padding-15px-left">
                    <a class="navbar-brand" title="Cassul Distribuidora" href="{{route('site.index')}}">
                        <img src="{{asset('images/logo-orange.png')}}" data-at2x="{{asset('images/logo-orange.png')}}" class="default-logo" alt="Logo Cassul">
                        <img src="{{asset('images/logo-orange.png')}}" data-at2x="{{asset('images/logo-orange.png')}}" class="alt-logo" alt="Logo Cassul">
                        <img src="{{asset('images/logo-orange.png')}}" data-at2x="{{asset('images/logo-orange.png')}}" class="mobile-logo" alt="Logo Cassul">
                    </a>
                </div>
                <div class="col-auto col-lg-8 menu-order sm-padding-15px-lr">
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item megamenu">
                                <a title="Página Inicial" href="{{route('site.index')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('quem-somos')}}" title="Sobre a Cassul Distribuidora" class="nav-link">Sobre</a>
                            </li>
                            <li class="nav-item dropdown simple-dropdown">
                                <a href="#" class="nav-link">Nossas Marcas</a>
                                <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{route('casspet')}}">Casspet</a></li>
                                    <li><a href="{{route('imbativel')}}">Imbatível</a></li>
                                    <li><a href="{{route('lactomais')}}">LactoMais</a></li>
                                    <li><a href="{{route('thorxx')}}">Thorxx</a></li>
                                    <li><a href="{{route('sellenza')}}">Sellenza</a></li>
                                </ul>
                            </li>
                            {{--                            <li class="nav-item">--}}
                            {{--                                <a href="#" class="nav-link">Loja Online</a>--}}
                            {{--                            </li>--}}
                            <li class="nav-item">
                                <a href="{{route('contato-geral')}}" title="Contato Cassul Distribuidora" class="nav-link">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trabalhe-conosco')}}" title="Trabalha Conosco" class="nav-link">Trabalhe Conosco</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                    <div class="header-social-icon d-inline-block">
                        <a href="https://www.facebook.com/CassulDistribuidora" title="Facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/cassuldistribuidora/" title="Instagram" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="half-section bg-light-gray bg-gradient-dark-slate-blue parallax" data-parallax-background-ratio="0.5"
             style="">
        <div class="container">
            <div class="row align-items-stretch justify-content-center extra-small-screen">
                <div class="col-12 col-xl-10 col-lg-7 col-md-8 page-title-medium text-center d-flex justify-content-center flex-column">
                    <h1 class="alt-font fw-bold text-orange margin-15px-bottom d-inline-block">
                        Blog - {{$notices['name-category']}}
                    </h1>
                    <h2 class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                        FIQUE POR DENTRO DAS NOSSAS NOVIDADES
                    </h2>
                </div>
            </div>
        </div>
    </section>

    @if($allCategories->count() > 0)
        <section class="bg-light-gray padding-3-rem-all">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- start filter navigation -->
                        <ul class="grid-filter nav nav-tabs justify-content-center border-0 text-uppercase font-weight-500 alt-font md-padding-4-half-rem-bottom sm-padding-2-rem-bottom">
                            <li class="nav"><a title="Todas as notícias" href="{{route('notices-blog.view-all-notices')}}">Todos</a></li>
                            @foreach($allCategories as $categories)
                                <li class="nav {{ $categories['id'] == $activeCategoryId ? 'active' : '' }}">
                                    <a title="{{$categories['name-category']}}" href="{{route("notices-blog.view-notice-category", $categories['id'])}}">
                                        {{$categories['name-category']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- end filter navigation -->
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($notices['noticesBlog']->count() > 0)
        <section class="bg-light-gray pt-3 padding-eleven-lr xl-padding-two-lr xs-no-padding-lr">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 blog-content">
                        <ul class="blog-grid blog-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col
                        xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            @foreach($notices['noticesBlog'] as $noticesBlog)
                                <li class="grid-item wow animate__fadeIn">
                                    <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                                        <div class="blog-post-image bg-medium-slate-blue">
                                            <a href="{{route('notices-blog.view-details-notices', $noticesBlog['id'])}}" title="{{$noticesBlog['title']}}">
                                                <img src="data:image/jpeg;base64,{{$noticesBlog['avatar']}}" alt="{{$noticesBlog['title']}}">
                                            </a>
                                            <a href="{{route('notices-blog.view-notice-category', $notices['id'])}}" class="blog-category alt-font">
                                                {{$notices['name-category']}}
                                            </a>
                                        </div>
                                        <div class="post-details padding-3-rem-lr padding-2-half-rem-tb">
                                            <a href="{{route('notices-blog.view-details-notices', $noticesBlog['id'])}}" class="alt-font text-small d-inline-block margin-10px-bottom">
                                                {{ \Carbon\Carbon::parse($noticesBlog['created_at'])->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }}
                                            </a>
                                            <a href="{{route('notices-blog.view-details-notices', $noticesBlog['id'])}}"
                                               title="{{$noticesBlog['title']}}"
                                               class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray margin-15px-bottom d-block">
                                                {{$noticesBlog['title']}}
                                            </a>
                                            <p class="subtitle-blog">
                                                {{$noticesBlog['subtitle']}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="bg-light-gray container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="alt-font text-extra-dark-gray font-weight-600 mb-0">Ops!</h2>
                    <p class="mt-3 text-medium-gray text-uppercase">Ainda não há notícias cadastradas.</p>
                </div>
            </div>
        </div>
    @endif

    @include('site.includes.footer')
@endsection

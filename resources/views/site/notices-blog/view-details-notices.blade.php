@extends('site.includes.base-layout')

@section('title', 'Blog')

@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-general">
        <div class="container-fluid nav-header-container">
            <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                <a class="navbar-brand" title="Cassul Distribuidora" href="{{route('site.index')}}">
                    <img src="{{asset('images/logo-white.png')}}" data-at2x="{{asset('images/logo-white.png')}}" class="default-logo" alt="Logo Cassul">
                    <img src="{{asset('images/logo-orange.png')}}" data-at2x="{{asset('images/logo-orange.png')}}" class="alt-logo" alt="Logo Cassul">
                    <img src="{{asset('images/logo-orange.png')}}" data-at2x="{{asset('images/logo-orange.png')}}" class="mobile-logo" alt="Logo Cassul">
                </a>
            </div>
            <div class="col-auto col-lg-8 menu-order px-lg-0">
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
<!-- end header -->
<!-- start page title -->
<section class="half-section parallax pb-5" data-parallax-background-ratio="0.5" style="background-image:url('images/portfolio-bg.jpg');">
    <div class="container">
        <div class="row align-items-stretch justify-content-center">
            <div class="col-12 col-xl-12 col-lg-12 col-md-12 page-title-extra-small text-center d-flex justify-content-center flex-column">
                <h1 class="alt-font text-gradient-sky-blue-pink margin-15px-bottom d-inline-block">
                    Blog standard layout
                </h1>
                <h2 class="text-extra-dark-gray alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45
                xs-line-height-30no-margin-bottom">
                    {{$noticeBlog['title']}}
                </h2>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="blog-right-side-bar pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                <!-- start blog item -->
                <div class="col-12 blog-post-content overflow-hidden text-center p-0 margin-4-half-rem-bottom wow animate__fadeIn">
                    <div class="blog-image">
                        <a href="blog-post-layout-01.html">
                            <img src="data:image/jpeg;base64,{{$noticeBlog['avatar']}}" alt=""/>
                        </a>
                    </div>
                    <div class="blog-text d-inline-block w-100 mt-5">
                        {!! $noticeBlog['content'] !!}
                    </div>
                </div>
            </div>
            <aside class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-md-7 blog-sidebar lg-padding-4-rem-left md-padding-15px-left">
                <div class="margin-5-rem-bottom xs-margin-35px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-35px-bottom">Categorias</span>
                    <ul class="list-style-07 list-unstyled">
                        <li><a href="blog-grid.html">Entertainment</a><span class="item-qty">10</span></li>
                        <li><a href="blog-grid.html">Business</a><span class="item-qty">05</span></li>
                        <li><a href="blog-grid.html">Creative</a><span class="item-qty">03</span></li>
                        <li><a href="blog-grid.html">Lifestyle</a><span class="item-qty">02</span></li>
                        <li><a href="blog-grid.html">Fashion</a><span class="item-qty">19</span></li>
                        <li><a href="blog-grid.html">Design</a><span class="item-qty">21</span></li>
                    </ul>
                </div>
            </aside>
            <!-- end sidebar -->
        </div>
    </div>
</section>

@include('site.includes.footer')
@endsection

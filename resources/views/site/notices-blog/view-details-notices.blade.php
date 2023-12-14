@extends('site.includes.base-layout')

@section('title', 'Blog')

@section('content')
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent border-bottom border-color-black-transparent header-light fixed-top top-space header-reverse-scroll">
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
                            <a href="{{route('notices-blog.view-all-notices')}}" class="nav-link active">Blog</a>
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

<section class="blog-right-side-bar">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom">
                <div class="row">
                    <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                        <ul class="list-unstyled margin-2-rem-bottom">
                            <li class="d-inline-block align-middle margin-25px-right">
                                <i class="feather icon-feather-calendar text-fast-orange margin-10px-right"></i>
                                {{ \Carbon\Carbon::parse($noticeBlog['date'])->locale('pt_BR')->isoFormat('D [de] MMMM [de] YYYY') }}
                            </li>

                            <li class="d-inline-block align-middle margin-25px-right">
                                <i class="feather icon-feather-folder text-fast-orange margin-10px-right"></i>
                                <a title="{{$noticeBlog['categoryBlog']['name_category']}}"
                                   href="{{route('notices-blog.view-notice-category', ['slug' => Str::slug($noticeBlog['categoryBlog']['name_category'])])}}">
                                    {{$noticeBlog['categoryBlog']['name_category']}}
                                </a>
                            </li>
                            <li class="d-inline-block align-middle">
                                <i class="feather icon-feather-user text-fast-orange margin-10px-right"></i>
                                Por Cassul Distribuidora
                            </li>
                        </ul>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray margin-2-rem-bottom">
                            {{$noticeBlog['title']}}
                        </h5>
                        <img src="data:image/jpeg;base64,{{$noticeBlog['avatar']}}"
                             alt="{{$noticeBlog['title']}}"
                             class="w-100 border-radius-6px margin-2-rem-bottom">
                        <p>
                            {!! $noticeBlog['content'] !!}
                        </p>
                    </div>
                </div>
            </div>
            <aside class="col-12 col-xl-3 offset-xl-1 col-lg-4 col-md-7 blog-sidebar lg-padding-4-rem-left md-padding-15px-left">
                <div class="margin-5-rem-bottom xs-margin-35px-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-large text-extra-dark-gray d-block margin-35px-bottom">
                        <i class="feather icon-feather-folder margin-5px-right"></i>
                        Categorias
                    </span>

                    <ul class="list-style-07 list-unstyled">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('notices-blog.view-notice-category', ['slug' => Str::slug($category['name_category'])])}}"
                                   title="{{$category['name_category']}}">
                                    {{$category['name_category']}}
                                </a>
                                <span class="item-qty">
                                    {{count($category['noticesBlog'])}}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>


@include('site.includes.footer')
@endsection

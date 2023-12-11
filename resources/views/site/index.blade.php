@extends('site.includes.base-layout')

@section('title', 'Erechim - RS')

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
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-label="Toggle navigation">
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                        <span class="navbar-toggler-line"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav alt-font">
                            <li class="nav-item megamenu">
                                <a title="Página Inicial" href="{{route('site.index')}}" class="nav-link  active">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('quem-somos')}}" title="Sobre a Cassul Distribuidora" class="nav-link">Sobre</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">Produtos</a>--}}
{{--                            </li>--}}
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
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link">Blog</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a href="{{route('contato-geral')}}" title="Contato Cassul Distribuidora" class="nav-link">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trabalhe-conosco')}}" class="nav-link">Trabalhe Conosco</a>
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

    <section class="p-0 mobile-height parallax" data-parallax-background-ratio="0.5"
             style="background-image: url('data:image/png;base64,{{$home['avatar'] ?? ''}}');">
        <div class="opacity-light bg-gradient-black-blue z-index-0"></div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6 col-lg-7 col-md-10 d-flex flex-column justify-content-center text-center full-screen position-relative z-index-1 md-landscape-h-600px">
                        <span class="margin-35px-bottom alt-font text-large text-white font-weight-300 d-block xs-margin-15px-bottom">
                            {{$home['home_subtitle'] ?? ''}}
                        </span>
                    <h2 class="text-white alt-font font-weight-600 letter-spacing-minus-1 text-shadow-large sm-no-text-shadow">
                        {{$home['home_title'] ?? ''}}
                    </h2>
                    <div class="text-center position-absolute bottom-100px left-0px w-100 sm-bottom-50px">
                        <a href="https://m.youtube.com.com/watch?v=H7bQKbQe2kw" class="popup-youtube video-icon-box video-icon-large position-relative">
                        <span>
                            <span class="video-icon bg-orange margin-15px-right">
                                <i class="fas fa-play text-extra-dark-gray text-extra-large"></i>
                                <span class="video-icon-sonar">
                                    <span class="video-icon-sonar-bfr bg-orange opacity-7"></span>
                                </span>
                            </span>
                            <span class="video-icon-text alt-font text-medium text-white text-uppercase text-decoration-line-bottom d-inline-block align-middle font-weight-500">
                                Conheça nossa história
                            </span>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-section">
        <div class="container">
            <div class="row align-items-lg-center justify-content-center">
                <div class="col-12 col-lg-4 col-md-6 fancy-text-box-style-01 text-center text-md-start md-margin-50px-bottom sm-margin-40px-bottom wow animate__fadeIn">
                    <div class="fancy-text-box padding-3-half-rem-all md-padding-4-rem-all xs-padding-30px-all">
                        <img src="{{asset('images/logo-marcas/logo-cassul-40anos.svg')}}" alt="Cassul 40 anos">
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 text-center text-md-start wow animate__fadeIn" data-wow-delay="0.2s">
                        <span class="alt-font text-medium text-uppercase margin-20px-bottom d-block">
                            Desde 1983
                        </span>
                    <div class="alt-font text-extra-large text-extra-dark-gray font-weight-500 line-height-34px w-85 lg-w-100 sm-margin-15px-bottom">
                        Unindo marcas, construindo o futuro
                    </div>
                </div>
                <div class="col-12 col-lg-5 col-md-10 text-center text-md-start wow animate__fadeIn" data-wow-delay="0.4s">
                    <p class="w-85 lg-w-100">
                        Queremos compartilhar nossa história, valores e compromissos com você.
                        Descubra como nossa jornada desde 1983 nos transformou em um dos maiores
                        distribuidores do Sul do Brasil e como estamos empenhados em oferecer
                        excelência em produtos e serviços.
                    </p>
                    <a href="{{route('quem-somos')}}" class="btn btn-link thin btn-extra-large text-extra-dark-gray">Sobre a empresa</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray min-section" id="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 text-center margin-3-rem-bottom md-margin-7-rem-bottom sm-margin-5-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-gradient-magenta-orange text-uppercase d-block margin-10px-bottom letter-spacing-1px">Conheça nossas</span>
                    <h4 class="alt-font font-weight-600 text-black letter-spacing-minus-1px mb-0">Linhas de Produtos</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6">

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="grid-item grid-item-double wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box ">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/pet.webp')}}" class="img-fluid" alt="Linha de produtos PET" />
                                            <div class="portfolio-box-pet portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb
                                            padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 text-white alt-font text-black text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Pet</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px">
                                                    <i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="grid-item grid-item-double wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/exclusividades.webp')}}" class="img-fluid" alt="Linha de produtos exclusivos">
                                            <div class="portfolio-box-exclusividades portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb
                                            padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 text-white alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Nossas Exclusividades</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px">
                                                    <i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="grid-item photography wow animate__fadeIn" data-wow-delay="0.2s">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/domissanitarios.webp')}}" class="img-fluid" alt="Linha de produtos domissanitarios" />
                                            <div class="porfolio-box-domissanitarios portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Domissanitários</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px"><i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="grid-item logos web photography wow animate__fadeIn" data-wow-delay="0.4s">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/ferragens.webp')}}" class="img-fluid" alt="Linha de produtos ferragens" />
                                            <div class="portfolio-box-ferragens portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Ferragens</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px"><i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="grid-item grid-item-double wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/grandes-animais.webp')}}" class="img-fluid" alt="Linha grandes animais" />
                                            <div class="portfolio-grandes-animais portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-3-rem-tb
                                            padding-4-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Grandes Animais</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px">
                                                    <i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <div class="grid-item photography logos wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/garden.webp')}}" class="img-fluid" alt="Linha de produtos garden" />
                                            <div class="portfolio-box-garden portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Garden</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px"><i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="grid-item photography logos wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/agro.webp')}}" class="img-fluid" alt="Linha de produtos Agro" />
                                            <div class="portfolio-box-agro portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>Agro</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px"><i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="grid-item photography logos wow animate__fadeIn">
                                <a href="#">
                                    <div class="portfolio-box">
                                        <div class="portfolio-image">
                                            <img src="{{asset('images/linha/epis.webp')}}" class="img-fluid" alt="Linha de produtos EPI's" />
                                            <div class="portfolio-box-epis portfolio-hover bg-transparent-white justify-content-center d-flex flex-row align-items-center padding-1-rem-tb padding-1-rem-lr xl-padding-2-rem-all">
                                                <div class="text-start">
                                                    <h4 class="font-weight-600 alt-font text-white text-uppercase no-margin-bottom move-bottom-top-self">
                                                        <span>EPI's</span>
                                                    </h4>
                                                </div>
                                                <span class="position-absolute top-50px right-50px move-right-left lg-top-30px lg-right-30px sm-top-20px sm-right-20px"><i class="ti-arrow-top-right icon-small text-fast-white"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="big-section bg-seashell p-0 wow animate__fadeIn d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-6 col-lg-4 cover-background d-flex justify-content-center align-items-center md-h-450px xs-h-300px wow animate__fadeInLeft"
                     style="background-image: url('{{asset('images/banner-produtos/banner1.jpg')}}')">
                </div>
                <div class="col-12 col-xl-6 col-lg-8">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-12 col-sm-6 cover-background xs-h-300px wow animate__fadeIn" data-wow-delay="0.4s"
                                 style="background-image: url('{{asset('images/banner-produtos/banner2.jpg')}}')"></div>
                            <div class="col-12 col-sm-6 bg-seashell wow animate__fadeIn" data-wow-delay="0.5s"
                                 style="background-image: url('{{asset('images/icones/caixa.png')}}'); background-repeat: no-repeat; background-position: bottom -25px right 5px;">
                                <div class="padding-6-rem-lr padding-8-rem-tb md-padding-3-rem-lr md-padding-6-rem-tb xl-padding-3-rem-lr xl-padding-4-rem-tb">
                                    <span class="alt-font font-weight-600 text-extra-dark-gray text-large margin-20px-bottom d-block">Conheça nossos produtos</span>
                                    <p>Explore nossa variedade de produtos e descubra as melhores soluções para suas necessidades.
                                        Na Cassul, oferecemos qualidade e diversidade para tornar sua vida mais conveniente.</p>
                                    <a href="" class="btn btn-small btn-orange margin-5px-top">
                                        Visualizar produtos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 cover-background order-sm-2 xs-h-300px wow animate__fadeIn" data-wow-delay="0.8s"
                                 style="background-image: url('{{asset('images/banner-produtos/banner3.jpg')}}')">
                            </div>
                            <div class="col-12 col-sm-6 bg-seashell order-sm-1 wow animate__fadeIn" data-wow-delay="0.9s"
                                 style="{{asset('images/icones/verificacao.png')}}; background-repeat: no-repeat; background-position: bottom -35px right 25px;">
                                <div class="padding-6-rem-lr padding-8-rem-tb md-padding-3-rem-lr md-padding-6-rem-tb xl-padding-3-rem-lr xl-padding-4-rem-tb">
                                        <span class="alt-font font-weight-600 text-extra-dark-gray text-large margin-20px-bottom d-block">
                                            As maiores marcas do mercado</span>
                                    <p>Conheça as gigantes que confiam em nós para levar até você o melhor em qualidade e variedade.</p>
                                    <a href="" class="btn btn-small btn-orange margin-5px-top">Conhecer as marcas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="container">
            <div class="row justify-content-center wow animate__fadeIn">
                <div class="col-12 col-lg-6 col-md-8 col-sm-10 text-center margin-6-rem-bottom md-margin-4-rem-bottom">
                    <h4 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-1px">
                        Descubra o poder das nossas marcas próprias!
                    </h4>
                    <p class="w-80 mx-auto md-w-100 mb-0">
                        Conheça a qualidade que nossas marcas próprias oferecem para atender às suas necessidades
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2">
                <div class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn">
                    <div class="interactive-banners-style-08 box-shadow-large bg-white h-100 border-radius-6px overflow-hidden">
                        <div class="interactive-banners-box-image">
                            <a href="{{route('casspet')}}" title="Marca Casspet">
                                <img src="{{asset('images/banner-marcas-proprias/casspet.webp')}}" class="img-fluid" alt="Banner Casspet">
                                <div class="btn btn-white btn-rounded"><i class="fas fa-arrow-right"></i></div>
                                <div class="interactive-banners-box-hover opacity-full-dark bg-transparent-gradient-gray-orange"></div>
                            </a>
                        </div>
                        <div class="interactive-banners-box-content padding-35px-all text-center xs-padding-25px-all">
                            <a href="#" class="text-extra-dark-gray text-uppercase text-extra-dark-gray-hover text-medium alt-font
                                font-weight-500 d-block line-height-26px">Casspet</a>
                            <div class="position-relative">
                                <span>Cuidados para os pets</span>
                                <div class="interactive-banners-box-sub-title">
                                    <a href="{{route('casspet')}}" title="Conheça Casspet" class="btn btn-link thin btn-large text-orange">
                                        Conheça
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="interactive-banners-style-08 box-shadow-large bg-white h-100 border-radius-6px overflow-hidden">
                        <div class="interactive-banners-box-image">
                            <a href="{{route('imbativel')}}" title="Marca Imbatível">
                                <img src="{{asset('images/banner-marcas-proprias/imbativel.webp')}}" class="imbativel" alt="Banner Imbatível">
                                <div class="btn btn-white btn-rounded"><i class="fas fa-arrow-right"></i></div>
                                <div class="interactive-banners-box-hover opacity-full-dark bg-transparent-gradient-gray-orange"></div>
                            </a>
                        </div>
                        <div class="interactive-banners-box-content padding-35px-all text-center xs-padding-25px-all">
                            <a href="#" class="text-extra-dark-gray text-uppercase text-extra-dark-gray-hover text-medium alt-font font-weight-500 d-block line-height-26px">Imbatível</a>
                            <div class="position-relative">
                                <span>Na batalha contra pragas e insetos</span>
                                <div class="interactive-banners-box-sub-title">
                                    <a href="{{route('imbativel')}}" title="Conheça a Marca Imbatível" class="btn btn-link thin btn-large text-orange">
                                        Conheça
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="interactive-banners-style-08 box-shadow-large bg-white h-100 border-radius-6px overflow-hidden">
                        <div class="interactive-banners-box-image">
                            <a href="{{route('lactomais')}}" title="Marca Lactomais">
                                <img src="{{asset('images/banner-marcas-proprias/lactomais.webp')}}" class="img-fluid" alt="Banner LactoMais">
                                <div class="btn btn-white btn-rounded"><i class="fas fa-arrow-right"></i></div>
                                <div class="interactive-banners-box-hover opacity-full-dark bg-transparent-gradient-gray-orange"></div>
                            </a>
                        </div>
                        <div class="interactive-banners-box-content padding-35px-all text-center xs-padding-25px-all">
                            <a href="#" class="text-extra-dark-gray text-uppercase text-extra-dark-gray-hover text-medium alt-font font-weight-500 d-block line-height-26px">LactoMais</a>
                            <div class="position-relative">
                                <span>Soluções em nutrição e higienização animal</span>
                                <div class="interactive-banners-box-sub-title">
                                    <a href="{{route('lactomais')}}"
                                       title="Conheça a marca LactoMais"
                                       class="btn btn-link thin btn-large text-orange">
                                        Conheça
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2 justify-content-center margin-2-rem-top">
                <div class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn">
                    <div class="interactive-banners-style-08 box-shadow-large bg-white h-100 border-radius-6px overflow-hidden">
                        <div class="interactive-banners-box-image">
                            <a href="{{route('thorxx')}}" title="Marca Thorxx">
                                <img src="{{asset('images/banner-marcas-proprias/thorxx.webp')}}" class="img-fluid" alt="Banner Thorxx">
                                <div class="btn btn-white btn-rounded"><i class="fas fa-arrow-right"></i></div>
                                <div class="interactive-banners-box-hover opacity-full-dark bg-transparent-gradient-gray-orange"></div>
                            </a>
                        </div>
                        <div class="interactive-banners-box-content padding-35px-all text-center xs-padding-25px-all">
                            <a href="#" class="text-extra-dark-gray text-uppercase text-extra-dark-gray-hover text-medium alt-font font-weight-500 d-block line-height-26px">Thorxx</a>
                            <div class="position-relative">
                                <span>Especializada no segmento de ferragens</span>
                                <div class="interactive-banners-box-sub-title">
                                    <a href="{{route('thorxx')}}"
                                       title="Conheça a marca Thorxx"
                                       class="btn btn-link thin btn-large text-orange">Conheça</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col md-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="interactive-banners-style-08 box-shadow-large bg-white h-100 border-radius-6px overflow-hidden">
                        <div class="interactive-banners-box-image">
                            <a href="{{route('sellenza')}}" title="Marca Sellenza Sementes">
                                <img src="{{asset('images/banner-marcas-proprias/sellenza.webp')}}" class="img-fluid" alt="Banner Sellenza Sementes">
                                <div class="btn btn-white btn-rounded"><i class="fas fa-arrow-right"></i></div>
                                <div class="interactive-banners-box-hover opacity-full-dark bg-transparent-gradient-gray-orange"></div>
                            </a>
                        </div>
                        <div class="interactive-banners-box-content padding-35px-all text-center xs-padding-25px-all">
                            <a href="#" class="text-extra-dark-gray text-uppercase text-extra-dark-gray-hover text-medium alt-font font-weight-500 d-block line-height-26px">Sellenza</a>
                            <div class="position-relative">
                                <span>Semeando o Futuro, Grão a Grão.</span>
                                <div class="interactive-banners-box-sub-title">
                                    <a href="{{route('sellenza')}}" title="Conheça a marca Sellenza Sementes"
                                       class="btn btn-link thin btn-large text-orange">Conheça</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="big-section cover-background" style="background-image: url('{{asset('images/home-corporate-hand-crafted-bg.webp')}}');">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-10 col-lg-6 position-relative md-margin-9-rem-bottom wow animate__fadeIn">
                    <div class="w-70 overflow-hidden position-relative xs-w-80">
                        <img src="{{asset('images/revendedor/banner1.webp')}}" alt="Banner Revendedor 01" />
                    </div>
                    <div class="position-absolute right-35px bottom-minus-50px w-50 lg-bottom-minus-30px xs-right-15px" data-wow-delay="0.2s" data-parallax-layout-ratio="1.1">
                        <img src="{{asset('images/revendedor/banner2.webp')}}" alt="Banner Revendedor 02" />
                    </div>
                </div>
                <div class="col-10 col-xl-4 col-lg-5 offset-lg-1">
                    <h4 class="alt-font text-extra-dark-gray letter-spacing-minus-1px font-weight-600 margin-4-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">Seja um revendedor e compre online</h4>
                    <div class="row">
                        <!-- start feature box item -->
                        <div class="col-12 wow animate__fadeIn" data-wow-delay="0.2s">
                            <div class="feature-box feature-box-left-icon">
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="alt-font text-black font-weight-500 d-block margin-5px-bottom">Praticidade para comprar</span>
                                    <p class="w-85 xs-w-100">Com nosso sistema de compras online, você pode começar a revender as melhores marcas de forma prática e eficaz.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <div class="col-12 wow animate__fadeIn" data-wow-delay="0.2s"><div class="w-100 h-1px bg-medium-gray margin-3-rem-tb md-margin-2-rem-tb"></div></div>
                        <!-- start feature box item -->
                        <div class="col-12 wow animate__fadeIn" data-wow-delay="0.4s">
                            <div class="feature-box feature-box-left-icon">
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="alt-font text-black font-weight-500 d-block margin-5px-bottom">Acompanhe todos os seus pedidos</span>
                                    <p class="w-85 xs-w-100">Tenha o controle total dos seus pedidos com facilidade e precisão. Oferecemos a você as ferramentas para acompanhar cada passo do seu processo de compra com tranquilidade.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end feature box item -->
                        <div class="col-12 margin-4-rem-top d-inline-block wow animate__fadeIn" data-wow-delay="0.4s"><a href="{{route('site.index')}}" class="btn btn-large btn-expand-ltr text-black section-link">Conheça nossa loja online<span class="bg-orange"></span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($catalogs) > 0)
        <section class="half-section bg-light-gray">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h5 class="alt-font text-extra-dark-gray font-weight-500">Catálogos de Produtos</h5>
                    </div>
                </div>
                <div class="row text-center row-cols-1 row-cols-lg-4 row-cols-sm-2">
                    @foreach($catalogs as $catalog)
                        <div class="col interactive-banners-style-01 margin-30px-bottom xs-margin-15px-bottom">
                            <div class="interactive-banners-image border-radius-6px bg-dark-slate-blue">
                                <img src="data:image/jpeg;base64,{{$catalog['avatar']}}" class="scale img-fluid" alt="{{$catalog['name']}}" />
                                <div class="interactive-banners-hover bg-gradient-extra-dark-gray-transparent">
                                    <div class="d-table h-100 w-100">
                                        <div class="d-table-cell align-bottom padding-3-half-rem-tb xs-padding-6-half-rem-tb">
                                            <a title="{{$catalog['name']}}" href="{{route('download-pdf', ['filename' => $catalog['fileUpload']])}}" class="rounded-icon bg-orange interactive-banners-icon">
                                                <i class="feather icon-feather-download text-white"></i></a>
                                            <div class="font-weight-500 line-height-normal alt-font text-white text-large interactive-banners-title">
                                                {{$catalog['name']}}
                                            </div>
                                            <div class="font-weight-500 line-height-normal alt-font text-uppercase interactive-banners-sub-title">
                                                <a href="{{route('download-pdf', ['filename' => $catalog['fileUpload']])}}" class="text-white text-medium text-decoration-line-bottom">
                                                    Baixar Catálogo
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-link thin btn-extra-large text-extra-dark-gray margin-70px-top d-inline-block
                            -margin-40px-top sm-margin-20px-top">Visualizar todos os catálogos</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="big-section position-relative wow animate__fadeIn">
        <div class="opacity-full bg-gradient-orange-gray"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-8 col-md-10 position-relative text-center padding-five-tb">
                    <h3 class="alt-font text-white font-weight-600 margin-35px-bottom">Junte-se à Equipe Cassul</h3>
                    <p class="text-white opacity-7 alt-font text-large w-80 mx-auto line-height-32px margin-45px-bottom sm-w-100">Se você busca fazer parte de uma equipe dedicada, comprometida e em constante crescimento, a Cassul é o lugar certo para você.</p>
                    <a href="{{route('trabalhe-conosco')}}" class="btn btn-large btn-white btn-rounded btn-box-shadow">Conhecer as vagas</a>
                </div>
            </div>
        </div>
        <video loop="" autoplay="" controls="" muted class="html-video" poster="{{asset('images/banners/imagem-video-fundo.jpg')}}">
            <source type="video/mp4" src="" />
            <source type="video/webm" src="" />
        </video>
    </section>

    <section class="bg-white wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 col-md-8 text-center margin-5-rem-bottom md-margin-3-rem-bottom">
                    <h4 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-1px">Últimas do Blog</h4>
                    <p class="w-80 mx-auto md-w-100 mb-0">Descubra informações valiosas e tendências do setor em nossos posts mais recentes do blog</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 blog-content">
                    <ul class="blog-grid blog-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                        <li class="grid-sizer"></li>
                        <!-- start blog item -->
                        <li class="grid-item wow animate__fadeIn">
                            <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                                <div class="blog-post-image bg-medium-slate-blue">
                                    <a href="blog-post-layout-01.html" title=""><img src="https://via.placeholder.com/800x560" alt=""></a>
                                    <a href="blog-masonry.html" class="blog-category alt-font">Creative</a>
                                </div>
                                <div class="post-details padding-3-rem-lr padding-2-half-rem-tb">
                                    <a href="blog-masonry.html" class="alt-font text-small text-shamrock-green-hover d-inline-block margin-10px-bottom">18 February 2020</a>
                                    <a href="blog-post-layout-01.html" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-shamrock-green-hover margin-15px-bottom d-block">Never give in except to convictions good sense</a>
                                    <p>Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum been dummy...</p>
                                </div>
                            </div>
                        </li>

                        <li class="grid-item wow animate__fadeIn" data-wow-delay="0.2s">
                            <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                                <div class="blog-post-image bg-medium-slate-blue">
                                    <a href="blog-post-layout-02.html" title=""><img src="https://via.placeholder.com/800x560" alt=""></a>
                                    <a href="blog-masonry.html" class="blog-category alt-font">Concept</a>
                                </div>
                                <div class="post-details padding-3-rem-lr padding-2-half-rem-tb">
                                    <a href="blog-masonry.html" class="alt-font text-small text-shamrock-green-hover d-inline-block margin-10px-bottom">09 January 2020</a>
                                    <a href="blog-post-layout-02.html" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-shamrock-green-hover margin-15px-bottom d-block">Simplicity is the ultimate sophistication</a>
                                    <p>Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum been dummy...</p>
                                </div>
                            </div>
                        </li>

                        <li class="grid-item wow animate__fadeIn" data-wow-delay="0.4s">
                            <div class="blog-post border-radius-5px bg-white box-shadow-medium">
                                <div class="blog-post-image bg-medium-slate-blue">
                                    <a href="blog-post-layout-03.html" title=""><img src="https://via.placeholder.com/800x560" alt=""></a>
                                    <a href="blog-masonry.html" class="blog-category alt-font">Nature</a>
                                </div>
                                <div class="post-details padding-3-rem-lr padding-2-half-rem-tb">
                                    <a href="blog-masonry.html" class="alt-font text-small text-shamrock-green-hover d-inline-block margin-10px-bottom">12 December 2020</a>
                                    <a href="blog-post-layout-03.html" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-shamrock-green-hover margin-15px-bottom d-block">People ignore designs that ignore people</a>
                                    <p>Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum been dummy...</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="blog-masonry.html" class="btn btn-link thin btn-extra-large text-extra-dark-gray margin-70px-top d-inline-block md-margin-40px-top sm-margin-20px-top">Visualizar todas as matérias</a>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.footer')
@endsection





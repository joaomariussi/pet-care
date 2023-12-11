
@extends('site.includes.base-layout')

@section('title', 'LactoMais')

@section('content')
    <style type="text/css">
        .outras-marcas {
            background-color: #01458e;
            color: white;
        }

        .outras-marcas:hover {
            color: white;
        }

        .footer-dark {
            background: linear-gradient(to right, #01458e, #000000) !important;
        }
    </style>

    <!--start header-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-scroll-lactomais">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand" title="Marca LactoMais" href="{{route('lactomais')}}">
                        <img src="{{asset('images/logo-marcas/Lacto-Mais.webp')}}" data-at2x="{{asset('images/logo-marcas/Lacto-Mais.webp')}}"
                             class="default-logo img-navbar" alt="Logo LactoMais">
                        <img src="{{asset('images/logo-marcas/Lacto-Mais.webp')}}" data-at2x="{{asset('images/logo-marcas/Lacto-Mais.webp')}}"
                             class="alt-logo img-navbar" alt="Logo LactoMais">
                        <img src="{{asset('images/logo-marcas/Lacto-Mais.webp')}}" data-at2x="{{asset('images/logo-marcas/Lacto-Mais.webp')}}"
                             class="mobile-logo img-navbar" alt="Logo LactoMais">
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
                            <li class="nav-item">
                                <a href="#sobre" title="Sobre a Casspet" class="nav-link">
                                    Sobre
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#linhas" title="Sobre a Cassul Distribuidora" class="nav-link">
                                    Linhas
                                </a>
                            </li>
                            <li class="nav-item megamenu">
                                <a href="#produtos" class="nav-link">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a href="#encontrar" class="nav-link">
                                    Onde Encontrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contato" class="nav-link">
                                    Contato
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                    <div class="header-social-icon d-inline-block">
                        <a title="Facebook Cassul Distribuidora" href="https://www.facebook.com/CassulDistribuidora" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a title="Instagram Cassul Distribuidora" href="https://www.instagram.com/cassuldistribuidora/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- end header -->
    <!-- start slider section -->
    <section class="p-0 sm-border-bottom border-color-medium-gray mobile-height" >
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="swiper-container full-screen p-0 md-landscape-h-600px white-move"
                     data-slider-options='{ "slidesPerView": 1, "loop": false, "pagination":
                 { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" },
                  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background" style="background-image:url('https://via.placeholder.com/1920x1080');">
                            <div class="d-flex flex-column justify-content-end ms-auto w-600px h-100 xl-w-550px sm-w-70 sm-w-100">
                                <div class="bg-white padding-7-rem-tb padding-8-rem-lr xl-padding-5-rem-tb xl-padding-6-rem-lr xs-padding-2-half-rem-all">
                                    <div class="col-12 p-0 margin-25px-bottom d-md-inline-block align-items-center justify-content-center">
                                        <span class="w-35px h-1px d-inline-block align-middle bg-medium-gray margin-15px-left margin-15px-right"></span>
                                        <span class="d-inline-block alt-font text-gradient-lactomais text-uppercase font-weight-500 align-middle">Lacto Mais</span>
                                    </div>
                                    <div class="col-12 p-0 alt-font justify-content-center margin-10px-bottom">
                                        <div class="d-flex">
                                            <h4 class="m-0 align-self-center text-extra-dark-gray text-uppercase font-weight-700 letter-spacing-minus-2px w-80">
                                                Conheça nossa História
                                            </h4>
                                            <span class="align-self-center text-center margin-30px-left">
                                            <a href="#history" class="d-inline-block line-height-65px rounded-circle bg-lactomais w-60px h-60px">
                                                <i class="feather icon-feather-arrow-right text-extra-large text-white"></i>
                                            </a>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
    <!-- start section -->
    <section class="big-section overflow-visible position-relative z-index-1 wow animate__fadeIn" id="sobre">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-lg-4 col-md-6 col-sm-7 d-flex flex-column md-margin-6-rem-bottom sm-margin-5-rem-bottom wow animate__fadeIn" id="history">
                    <h6 class="alt-font text-uppercase text-extra-dark-gray font-weight-700 margin-20px-bottom lg-w-90 md-w-75 md-margin-10px-bottom">
                        Sobre a Lacto Mais
                    </h6>
                    <div class="mt-auto w-80 mx-lg-0">
                        <p>
                            Desde 2009, a Lacto Mais tem estado presente no mercado e oferece uma ampla gama de produtos e soluções para higienização e nutrição animal,
                            com foco especial em bovinos de leite e corte.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 last-paragraph-no-margin  md-margin-6-rem-bottom sm-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.2s" data-wow-duration="0.3">
                    <div class="alt-font text-uppercase text-extra-medium font-weight-600 text-extra-dark-gray margin-25px-bottom sm-margin-15px-bottom">
                        Nosso Objetivo
                    </div>
                    <p class="w-85 xl-w-100">
                        Fornecer soluções inteligentes para produtores, incluindo suplementos nutracêuticos, minerais e vitaminas, pré e pós-dipping, detergentes
                        higienizadores para equipamentos de ordenha e acessórios diversos.
                    </p>
                    <p class="w-85 xl-w-100">
                        Garantir a satisfação dos nossos clientes e melhorar continuamente nossos produtos e serviços.
                    </p>
                </div>
                <div class="col-12 col-lg-4 last-paragraph-no-margin">
                    <div class="outside-box-bottom position-relative">
                        <img src="https://via.placeholder.com/720x1084" class="wow animate__fadeIn" data-wow-delay="0.5s" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-penguin-white position-relative padding-thirteen-top lg-padding-nine-top" id="linhas">
        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 overflow-hidden alt-font font-weight-600 text-white text-overlap-style-02 d-none d-xl-block wow animate__fadeInDown" data-wow-delay="0.2s">
                    Nossas Linhas
                </div>
                <div class="col-12 col-lg-6 col-sm-8 text-lg-center margin-6-rem-bottom lg-margin-4-rem-bottom md-margin-3-rem-bottom xs-margin-5-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-gradient-lactomais text-uppercase d-block margin-20px-bottom">
                        Linha de produtos
                    </span>
                    <h5 class="alt-font font-weight-700 text-uppercase text-extra-dark-gray letter-spacing-minus-1px m-0">
                        Todas as nossas linhas de produtos para os bovinos de leite e corte.
                    </h5>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-xl-3 col-lg-4 position-relative padding-2-rem-top md-no-padding-top md-margin-5-rem-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <span class="alt-font margin-20px-bottom d-block text-uppercase font-weight-500">
                        Soluções Inteligentes
                    </span>
                    <h6 class="alt-font text-uppercase text-extra-dark-gray font-weight-700 margin-40px-bottom md-margin-20px-bottom">
                        Com a Lacto Mais você encontra soluções inteligentes para o seu rebanho.
                    </h6>
                    <div class="swiper-button-next-nav-2 swiper-button-next slider-navigation-style-06"><i class="line-icon-Arrow-OutRight"></i></div>
                    <div class="swiper-button-previous-nav-2 swiper-button-prev slider-navigation-style-06"><i class="line-icon-Arrow-OutLeft"></i></div>
                </div>
                <div class="col-12 col-lg-8 offset-xl-1 wow animate__fadeInRight" data-wow-delay="0.4s">
                    <div class="testimonials-carousel-style-02 swiper-simple-arrow-style-2">
                        <div class="swiper-container black-move" data-slider-options='{ "loop": true, "slidesPerView": 1, "spaceBetween": 0, "observer": true,
                        "observeParents": true, "autoplay": { "delay": 5000, "disableOnInteraction": false },
                        "navigation": { "nextEl": ".swiper-button-next-nav-2", "prevEl": ".swiper-button-previous-nav-2" },
                        "keyboard": { "enabled": true, "onlyInViewport": true }, "breakpoints": { "992": { "slidesPerView": 3 },
                        "768": { "slidesPerView": 2 } }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <!-- start fancy text box slider item -->
                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-color-black-transparent overflow-hidden">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">
                                                01
                                            </h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Suplementos
                                                </span>
                                                <p>
                                                    Uma linha de produtos de suplementos para bovinos de leite e corte é essencial para garantir o desenvolvimento saudável e produtivo do rebanho.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end fancy text box slider item -->
                                <!-- start fancy text box slider item -->
                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-all border-color-black-transparent overflow-hidden last-paragraph-no-margin">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">02</h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Sais Minerais
                                                </span>
                                                <p>
                                                    Fundamental para garantir que os animais recebam os nutrientes essenciais para o desenvolvimento saudável, a reprodução eficiente e a resistência a doenças.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end fancy text box slider item -->
                                <!-- start fancy text box slider item -->
                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-all border-color-black-transparent overflow-hidden last-paragraph-no-margin">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">03</h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Inoculantes
                                                </span>
                                                <p>
                                                    Essa linha de produtos é projetada para melhorar o processo de ensilagem, garantindo uma alimentação mais nutritiva e saudável para os animais.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end fancy text box slider item -->
                                <!-- start fancy text box slider item -->
                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-all border-color-black-transparent overflow-hidden last-paragraph-no-margin">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">
                                                04</h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Higiene
                                                </span>
                                                <p>
                                                    Ao adotar uma abordagem abrangente de higiene, os produtores contribuem significativamente para a prevenção de doenças, o aumento da produtividade e o bem-estar geral do rebanho.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-all border-color-black-transparent overflow-hidden last-paragraph-no-margin">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">
                                                05</h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Inseminação
                                                </span>
                                                <p>
                                                    Esses produtos são desenvolvidos para facilitar o processo de inseminação e aumentar as taxas de concepção.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide text-center padding-15px-all">
                                    <div class="feature-box text-start feature-box-show-hover box-shadow-small-hover feature-box-bg-white-hover border-all border-all border-color-black-transparent overflow-hidden last-paragraph-no-margin">
                                        <div class="feature-box-move-bottom-top padding-3-rem-tb padding-4-rem-lr md-padding-2-rem-tb md-padding-2-half-rem-lr sm-padding-3-rem-tb sm-padding-4-half-rem-lr">
                                            <h4 class="feature-box-icon alt-font font-weight-500 text-yellow-ochre-light margin-20px-bottom letter-spacing-minus-2px">
                                                06</h4>
                                            <div class="feature-box-content last-paragraph-no-margin">
                                                <span class="text-extra-dark-gray text-extra-medium font-weight-600 text-uppercase d-block margin-10px-bottom alt-font">
                                                    Linha de Acessórios
                                                </span>
                                                <p>
                                                    Esses acessórios são projetados para facilitar diversas atividades, desde o manejo diário até situações específicas de cuidado.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end fancy text box slider item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border-top border-color-medium-gray wow animate__fadeIn" id="produtos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 text-center margin-7-rem-bottom lg-margin-5-rem-bottom md-margin-4-rem-bottom wow animate__fadeIn">
                    <span class="alt-font font-weight-500 text-gradient-lactomais text-uppercase d-block margin-10px-bottom">
                        Nossos Produtos
                    </span>
                    <h5 class="alt-font font-weight-700 text-uppercase text-extra-dark-gray letter-spacing-minus-1px m-0">
                        Produtos mais vendidos da linha Lacto Mais.
                    </h5>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid padding-five-lr xl-padding-two-lr lg-padding-four-lr">
                    <div class="row row-cols-1 row-cols-xl-4 row-cols-sm-2">
                        <!-- start services item -->
                        <div class="swiper-container white-move swiper-auto-slide" data-slider-options='{ "loop": true, "slidesPerView": "4", "spaceBetween": 30,
                        "autoplay":
                        { "delay": 5000, "disableOnInteraction": false }, "effect": "slide" }'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center lg-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/phm-oral.webp')}}" width="415" height="530" class="img-fluid" alt="Produto PHM Oral Lacto Mais">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    PHM Oral Lacto Mais
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">
                                                    Linha de Suplementos
                                                </span>
                                                <a title="Comprar PHM Oral Lacto Mais" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center lg-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/phos-leite.webp')}}" width="415" height="530" class="img-fluid" alt="Produto Lacto Mais Phós Leite">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    Lacto Mais Phós Leite
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">
                                                    Linha de Sais Minerais
                                                </span>
                                                <a title="Comprar Lacto Mais Phós Leite" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.6s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/inoculante.webp')}}" width="415" height="530" class="img-fluid" alt="Produto Inoculante para Silagem">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    Inoculante para Silagem
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">
                                                    Linha de Inoculantes
                                                </span>
                                                <a title="Comprar Inoculante para Silagem" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center wow animate__fadeIn" data-wow-delay="0.8s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/detergente.webp')}}" width="415" height="530" class="img-fluid" alt="Produto Detergente Ácido">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    Detergente Ácido
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">Linha de Higiene</span>
                                                <a title="Comprar Detergente Ácido" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center wow animate__fadeIn" data-wow-delay="0.8s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/detergente.webp')}}" width="415" height="530" class="img-fluid" alt="Produto Linha de Inseminação">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    Luvas de Inseminação
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">
                                                    Linha de Inseminação
                                                </span>
                                                <a title="Comprar Linha de Inseminação" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="interactive-banners-style-11 text-center wow animate__fadeIn" data-wow-delay="0.8s">
                                        <div class="interactive-banners-box">
                                            <div class="interactive-banners-box-image">
                                                <img src="{{asset('images/lactomais/aplicador.webp')}}" width="415" height="530" class="img-fluid"
                                                     alt="Produto Aplicador de Pré Dipping (Espuma)">
                                                <div class="interactive-banners-text-overlay bg-slate-blue"></div>
                                                <div class="opacity-extra-medium bg-gradient-dark-slate-blue-transparent"></div>
                                            </div>
                                            <div class="interactive-banners-text-content padding-5-rem-lr xl-padding-3-half-rem-lr">
                                                <h6 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom">
                                                    Aplicador de Pré Dipping (Espuma)
                                                </h6>
                                                <span class="alt-font text-medium text-white opacity-7 text-uppercase letter-spacing-1px d-block">
                                                    Linha de Acessórios
                                                </span>
                                                <a title="Comprar Aplicador de Pré Dipping (Espuma)" href="#" class="btn btn-fancy btn-small btn-fast-blue-lactomais margin-35px-top">
                                                    Comprar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wow animate__fadeIn" id="encontrar">
        <iframe class="w-100 h-500px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.214706465866!2d-52.2887649!3d-27.
                    6770076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e31450f48bca91%3A0x78276bf6d5c94f17!2sCassul%20Distribuidora!5e0!3m2!1spt-BR!2sbr!
                    4v1699463687045!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <section id="contato" class="cover-background bg-extra-dark-gray big-section xs-no-padding-tb xs-border-tb border-color-medium-gray wow animate__fadeIn"
             style="background-image:url('{{asset('images/lactomais/Banner_Bovinos.webp')}}');">
        <div class="container xs-no-padding-lr">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div class="text-center bg-white box-shadow-large border-radius-6px padding-5-rem-tb padding-7-rem-lr sm-padding-5-rem-all xs-padding-3-half-rem-lr xs-padding-6-rem-tb xs-no-border-radius">
                    <span class="alt-font text-medium text-gradient-lactomais text-uppercase font-weight-500 d-block margin-15px-bottom sm-margin-10px-bottom">
                        Contato
                    </span>
                        <h5 class="alt-font text-dark-charcoal font-weight-700 letter-spacing-minus-1px mb-0 w-100 mx-auto xs-w-100">
                            Saiba mais sobre nossos produtos LactoMais!
                        </h5>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                        <span class="title-extra-small text-gradient-lactomais alt-font">
                            (47) 99999-9999
                        </span>
                        </div>

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=5547999999999&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Imbatível."
                           class="btn btn-fancy btn-large btn-fast-blue-lactomais btn-round-edge w-100 font-size-16" title="Enviar mensagem">
                            <i class="fab fa-whatsapp"></i> Enviar mensagem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.view-marcas')
    @include('site.includes.footer')
@endsection



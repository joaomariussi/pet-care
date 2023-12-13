@extends('site.includes.base-layout')

@section('title', 'Sobre a empresa')

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
                                <a href="{{route('site.index')}}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('quem-somos')}}" title="Sobre a Cassul Distribuidora" class="nav-link active">Sobre</a>
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
                            <li class="nav-item">
                                <a href="{{route('contato-geral')}}" title="Contato Cassul Distribuidora" class="nav-link">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trabalhe-conosco')}}" class="nav-link">Trabalhe Conosco</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('notices-blog.view-all-notices')}}" class="nav-link">Blog</a>
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

    <section class="parallax" data-parallax-background-ratio="0.5"
             style="background-image:url('{{asset('images/empresa/banner-sobre.webp')}}');">
        <div class="opacity-extra-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row align-items-stretch justify-content-center small-screen">
                <div class="col-12 position-relative page-title-extra-small text-center d-flex align-items-center justify-content-center flex-column">
                    <h1 class="alt-font text-white opacity-6 margin-20px-bottom">Quem somos?</h1>
                    <h2 class="subtitle-company text-white alt-font font-weight-500 w-55 md-w-65 sm-w-80 center-col xs-w-100 letter-spacing-minus-1px
                        line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                        Cassul Distribuidora: Impulsionando o sucesso por décadas!
                    </h2>
                </div>
                <div class="down-section text-center"><a href="#about" class="section-link"><i
                            class="ti-arrow-down icon-extra-small text-white bg-transparent-black padding-15px-all xs-padding-10px-all border-radius-100"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 pe-lg-0 d-flex md-margin-30px-bottom">
                    <div class="w-100 md-h-700px sm-h-550px xs-h-450px cover-background"
                         style="background-image:url('{{asset('images/empresa/01.webp')}}');"></div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 ps-lg-0 d-flex sm-margin-30px-bottom">
                    <div class="justify-content-center w-100 d-flex flex-column bg-transparent-gradient-gray-orange padding-5-half-rem-lr lg-padding-3-rem-lr md-padding-4-rem-all">
                            <span class="text-extra-large alt-font font-weight-500 text-white margin-20px-bottom d-block">
                                Fundada em 1983, surgimos como uma das mais inovadoras empresas do Brasil no segmento de varejo e distribuição.
                            </span>
                        <p class="text-white opacity-7">
                            Desde o início, nos compremetemos em atender às grandes demandas de nossos clientes,
                            oferecendo uma ampla gama de produtos de alta qualidade em diversos setores.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6">
                    <img src="{{asset('images/empresa/separacao.webp')}}" alt="Separação de produtos cassul"/>
                    <div class="bg-white padding-3-half-rem-lr padding-3-rem-tb lg-padding-2-rem-all md-padding-2-half-rem-all sm-padding-4-rem-all last-paragraph-no-margin">
                            <span class="alt-font text-extra-dark-gray font-weight-500 margin-10px-bottom d-block">
                                Compromisso com a Excelência
                            </span>
                        <p>
                            Ao longo dos anos, a Cassul tem investido em tecnologia de ponta e logística eficiente para garantir a entrega de produtos de
                            qualidade aos clientes de maneira rápida e eficaz.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="overflow-visible wow animate__fadeIn">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 position-relative margin-70px-top lg-margin-30px-top md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="w-70 border-radius-6px overflow-hidden position-relative">
                            <img src="{{asset('images/empresa/cassul-interna-3.webp')}}" alt="Cassul interna 3" />
                            <div class="opacity-extra-medium bg-gradient-orange-gray"></div>
                        </div>
                        <div class="position-absolute right-15px bottom-0px w-70" data-parallax-layout-ratio="1.1">
                            <img class="border-radius-6px" src="{{asset('images/empresa/cassul-interna-2.webp')}}" alt="Cassul interna 2" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 offset-lg-1 wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="alt-font text-extra-medium font-weight-500 margin-30px-bottom d-flex">
                            <span class="flex-shrink-0 w-50px h-1px bg-fast-orange opacity-7 align-self-center margin-20px-right"></span>
                            <div class="flex-grow-1">
                                <span class="text-gradient-magenta-orange">Qual é a missão da empresa?</span>
                            </div>
                        </div>
                        <h5 class="alt-font text-extra-dark-gray font-weight-500 margin-30px-bottom">
                            MISSÃO
                        </h5>
                        <p class="w-95">
                            Entender as necessidades de nossos clientes e a satisfação de nossos colaboradores, oferecendo a excelência no atendimento e
                            buscando resultados rentáveis para a empresa, sempre a serviço do desenvolvimento e bem-estar individual e coletivo.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-visible wow animate__fadeIn">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-5 offset-lg-1 wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="alt-font text-extra-medium font-weight-500 margin-30px-bottom d-flex">
                            <span class="flex-shrink-0 w-50px h-1px bg-fast-orange opacity-7 align-self-center margin-20px-right"></span>
                            <div class="flex-grow-1">
                                <span class="text-gradient-magenta-orange">Qual é a visão da empresa?</span>
                            </div>
                        </div>
                        <h5 class="alt-font text-extra-dark-gray font-weight-500 margin-30px-bottom">
                            VISÃO
                        </h5>
                        <p class="w-95">
                            Consolidarmos como empresa reconhecida e valorizada, ocupando um lugar de destaque entre as empresas deste segmento,
                            preservando a excelência no atendimento e a qualidade dos produtos.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 position-relative margin-70px-top lg-margin-30px-top md-margin-50px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="w-70 border-radius-6px overflow-hidden position-relative">
                            <img src="{{asset('images/empresa/cassul-interna-4.webp')}}" alt="Cassul Interna 4" />
                            <div class="opacity-extra-medium bg-gradient-orange-gray"></div>
                        </div>
                        <div class="position-absolute right-15px bottom-0px w-70" data-parallax-layout-ratio="1.1">
                            <img class="border-radius-6px" src="{{asset('images/empresa/cassul-interna-5.webp')}}" alt="Cassul Interna 5" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 col-sm-8 text-center margin-5-rem-bottom md-margin-3-rem-bottom">
                        <span class="text-extra-medium margin-15px-bottom alt-font d-block w-100">
                            Conheça nossos valores!
                        </span>
                    <h5 class="alt-font text-extra-dark-gray font-weight-500 margin-2-rem-bottom sm-w-100">
                        Valores que nos guiam e nos ajudam a crescer!
                    </h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- start feature box item -->
                <div class="col-12 col-lg-6 col-md-9 margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box h-100 feature-box-left-icon border-radius-5px bg-white box-shadow-small feature-box-dark-hover overflow-hidden padding-3-rem-all">
                        <div class="feature-box-icon">
                            <i class="line-icon-Like-2 icon-medium text-fast-orange"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                                <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                                    Credibilidade
                                </span>
                            <p>
                                Agir com integridade, ética e honestidade em todas as suas decisões, a fim de estabelecer relações de confiança com nossos clientes,
                                parceiros e colegas de trabalho.
                            </p>
                        </div>
                        <div class="feature-box-overlay bg-transparent-gradient-gray-orange"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-12 col-lg-6 col-md-9 margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box h-100 feature-box-left-icon border-radius-5px bg-white box-shadow-small feature-box-dark-hover overflow-hidden padding-3-rem-all">
                        <div class="feature-box-icon">
                            <i class="line-icon-Handshake icon-medium text-fast-orange"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                                <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                                    Respeito
                                </span>
                            <p>
                                Respeitar o individual, a liberdade de expressão, para que o coletivo apareça de forma saudável e favoreça
                                o desenvolvimento de toda a equipe, clientes e parceiros.
                            </p>
                        </div>
                        <div class="feature-box-overlay bg-transparent-gradient-gray-orange"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-12 col-lg-6 col-md-9 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box h-100 feature-box-left-icon border-radius-5px bg-white box-shadow-small feature-box-dark-hover overflow-hidden padding-3-rem-all">
                        <div class="feature-box-icon">
                            <i class="line-icon-One-FingerTouch icon-medium text-fast-orange"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                                <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                                    Profissionalismo
                                </span>
                            <p>
                                Fornecer e incentivar atitudes inovadoras, a fim de suprir as necessidades de nossos clientes, atuando sempre de forma íntegra
                                e ética em todas as situações.
                            </p>
                        </div>
                        <div class="feature-box-overlay bg-transparent-gradient-gray-orange"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-12 col-lg-6 col-md-9">
                    <div class="feature-box h-100 feature-box-left-icon border-radius-5px bg-white box-shadow-small feature-box-dark-hover overflow-hidden padding-3-rem-all">
                        <div class="feature-box-icon">
                            <i class="line-icon-Love-User icon-medium text-fast-orange"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                                <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                                    Humana
                                </span>
                            <p>
                                Valorizar, respeitar e reconhecer as limitações individuais, buscando o pleno desenvolvimento do grupo.
                            </p>
                        </div>
                        <div class="feature-box-overlay bg-transparent-gradient-gray-orange"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-position-left-bottom background-no-repeat">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 position-relative z-index-1 md-margin-50px-bottom sm-margin-35px-bottom wow animate__fadeIn" data-wow-delay="0.1s">
                    <div class="tilt-box" data-tilt-options='{ "maxTilt": 20, "perspective": 1000, "easing": "cubic-bezier(.03,.98,.52,.99)", "scale": 1, "speed": 500, "transition": true, "reset": true, "glare": false, "maxGlare": 1 }'>
                        <img src="{{asset('images/empresa/proposito.webp')}}" alt="Nosso propósito" />
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray w-100 margin-15px-bottom letter-spacing-minus-1-half lg-w-90 md-margin-35px-bottom wow
                         animate__fadeInRight" data-wow-delay="0.1s">
                        Nosso Propósito
                    </h5>
                    <h6 class="alt-font font-weight-300 text-extra-dark-gray w-100">
                        Estar presente no cliente, levando soluções com qualidade e rapidez;
                    </h6>
                    <p class="w-100 font-size-16">
                        A arte que representa nosso propósito foi concebida sobre um quebra-
                        cabeças, onde cada peça representa um setor dentro da empresa.
                    </p>
                    <ul class="list-style-06">
                        <li class="margin-25px-bottom last-paragraph-no-margin md-margin-25px-bottom wow animate__fadeInRight" data-wow-delay="0.2s">
                            <div><span class="w-25px h-25px text-center bg-neon-orange rounded-circle text-white margin-25px-right margin-5px-top d-flex flex-column">
                                        <i class="fas fa-check"></i></span>
                            </div>
                            <div><span class="text-extra-medium text-extra-dark-gray font-weight-500 d-block">
                                        No quadro 1, os setores sozinhos não podem montar o nosso propósito.
                                    </span>
                            </div>
                        </li>
                        <li class="margin-25px-bottom last-paragraph-no-margin md-margin-25px-bottom wow animate__fadeInRight" data-wow-delay="0.3s">
                            <div><span class="w-25px h-25px text-center bg-neon-orange rounded-circle text-white margin-25px-right margin-5px-top d-flex flex-column">
                                        <i class="fas fa-check"></i></span></div>
                            <div>
                                    <span class="text-extra-medium text-extra-dark-gray font-weight-500 d-block">
                                        No quadro 2, cada mão é a mão do líder de cada setor, representando a união e o empenho de cada time, cada pessoa em montar o nosso
                                        propósito.
                                    </span>
                            </div>
                        </li>

                        <li class="margin-25px-bottom last-paragraph-no-margin md-margin-25px-bottom wow animate__fadeInRight" data-wow-delay="0.3s">
                            <div><span class="w-25px h-25px text-center bg-neon-orange rounded-circle text-white margin-25px-right margin-5px-top d-flex flex-column">
                                        <i class="fas fa-check"></i></span></div>
                            <div>
                                    <span class="text-extra-medium text-extra-dark-gray font-weight-500 d-block">
                                        No quadro 3, nosso propósito montado.
                                    </span>
                            </div>
                        </li>
                    </ul>
                    <div class="d-inline-block wow animate__fadeInRight" data-wow-delay="0.4s">
                        Cada setor dentro da empresa possui um quadro com o propósito e a
                        sua peça do setor em ênfase.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray wow animate__fadeIn">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 md-margin-50px-bottom wow animate__fadeIn">
                    <div class="swiper-container white-move border-all border-width-12px border-color-white box-shadow-large border-radius-8px"
                         data-slider-options='{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{asset('images/equipe/equipe-01.webp')}}" alt="Equipe Geral">
                            </div>
                            <div class="swiper-slide"><img src="{{asset('images/equipe/equipe-02.webp')}}" alt="Equipe Fabrica"></div>
                        </div>
                        <div class="swiper-button-next-nav swiper-button-next slider-navigation-style-01 light">
                            <i class="feather icon-feather-arrow-right" aria-hidden="true"></i>
                        </div>
                        <div class="swiper-button-previous-nav swiper-button-prev slider-navigation-style-01 light">
                            <i class="feather icon-feather-arrow-left" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1 wow animate__fadeIn" data-wow-delay="0.2s">
                    <h5 class="alt-font text-extra-dark-gray font-weight-500">
                        Nossa Equipe
                    </h5>
                    <p>
                        A equipe da <strong class="text-fast-orange">Cassul Distribuidora</strong> é formada por profissionais altamente qualificados e treinados para atender
                        as necessidades de nossos clientes.
                    </p>
                    <ul class="p-0 list-style-02 margin-2-rem-top margin-3-rem-bottom">
                        <li class="margin-15px-bottom">
                            <i class="feather icon-feather-arrow-right-circle text-large text-fast-orange margin-10px-right" aria-hidden="true"></i>
                            <span class="text-extra-dark-gray alt-font">
                                    Entrega rápida e segura.
                                </span>
                        </li>
                        <li class="margin-15px-bottom">
                            <i class="feather icon-feather-arrow-right-circle text-large text-fast-orange margin-10px-right" aria-hidden="true"></i>
                            <span class="text-extra-dark-gray alt-font">
                                    Atendimento personalizado e eficiente.
                                </span>
                        </li>
                        <li class="margin-15px-bottom">
                            <i class="feather icon-feather-arrow-right-circle text-large text-fast-orange margin-10px-right" aria-hidden="true"></i>
                            <span class="text-extra-dark-gray alt-font">
                                    Equipe de vendas especializada.
                                </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-blue overlap-height xs-no-padding wow animate__fadeIn">
        <div class="container xs-no-padding">
            <div class="row align-items-center overlap-gap-section no-margin-lr">
                <div class="col-12 col-lg-6 align-self-lg-stretch p-0 cover-background md-h-400px wow animate__fadeIn"
                     style="background-image:url('{{asset('images/empresa/cassul-40-anos.webp')}}');"></div>
                <div class="col-12 col-lg-6 p-0 text-center wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="padding-3-rem-lr padding-3-rem-tb lg-padding-4-rem-lr lg-padding-5-rem-tb md-padding-5-rem-all">
                        <h5 class="text-orange alt-font margin-20px-bottom d-block">
                            Cassul Distribuidora - 40 anos
                        </h5>
                        <h6 class="alt-font text-white font-weight-500 margin-40px-bottom xs-margin-20px-bottom">
                            Quatro décadas de dedicação, excelência e confiança.
                            Cada ano um capítulo de sucesso, e você cliente faz parte dessa história.
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wow animate__fadeIn pt-md-0 pb-md-0 overflow-visible sm-border-bottom sm-border-color-medium-gray">
        <div class="container">
            <div class="row align-items-center justify-content-center no-margin-lr overlap-section">
                <div class="col-12 box-shadow-medium bg-white align-items-center padding-4-rem-all sm-no-padding-tb sm-padding-15px-lr sm-box-shadow-none">
                    <div class="row row-cols-1 row-cols-md-3">
                        <!-- start counter item -->
                        <div class="col border-right border-color-medium-gray text-center sm-no-border-right sm-margin-30px-bottom">
                            <h4 class="text-fast-orange alt-font font-weight-500 mb-xl-0 d-inline-block align-middle w-130px lg-w-100 counter"
                                data-speed="2000" data-to="1460"></h4>
                            <div class="d-inline-block align-middle text-center text-xl-start">
                                <span class="alt-font text-extra-dark-gray font-weight-500 line-height-14px d-block ">Clientes atendidos</span>
                                <span class="alt-font">em três estados</span>
                            </div>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col border-right border-color-medium-gray text-center sm-no-border-right sm-margin-30px-bottom">
                            <h4 class="text-fast-orange alt-font font-weight-500 mb-xl-0 d-inline-block align-middle w-130px lg-w-100 counter"
                                data-speed="2000" data-to="13500"></h4>
                            <div class="d-inline-block align-middle text-center text-xl-start">
                                <span class="alt-font text-extra-dark-gray font-weight-500 line-height-14px d-block">Produtos</span>
                                <span class="alt-font">em nosso portfólio</span>
                            </div>
                        </div>
                        <!-- end counter item -->
                        <!-- start counter item -->
                        <div class="col text-center">
                            <h4 class="text-fast-orange alt-font font-weight-500 mb-xl-0 d-inline-block align-middle w-130px lg-w-100 counter"
                                data-speed="2000" data-to="125"></h4>
                            <div class="d-inline-block align-middle text-center text-xl-start">
                                <span class="alt-font text-extra-dark-gray font-weight-500 line-height-14px d-block">Cidades Atendidas</span>
                                <span class="alt-font">pela Cassul</span>
                            </div>
                        </div>
                        <!-- end counter item -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wow animate__fadeIn">
        <div class="container">
            <div class="bg-medium-light-gray margin-6-rem-bottom margin-3-rem-top w-100 h-1px"></div>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-xl-7 col-md-8 col-sm-10 text-center text-md-start sm-margin-30px-bottom wow animate__fadeIn"
                     data-wow-delay="0.1s">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500 mb-0 md-w-90 sm-w-100"><strong
                            class="text-decoration-underline">Faça a diferença,</strong> e venha fazer parte da
                        equipe que esta mudando a distribuição no Sul do Brasil.</h6>
                </div>
                <div class="col-12 col-xl-5 col-md-4 text-center text-md-end wow animate__fadeIn" data-wow-delay="0.2s">
                    <a href="#"
                       class="btn btn-large btn-round-edge btn-transparent-fast-blue btn-slide-right-bg">Quero fazer parte da Cassul<span
                            class="bg-fast-blue"></span></a>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.footer')
@endsection

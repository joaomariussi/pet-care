@extends('site.includes.base-layout')

@section('title', 'Sellenza')

@section('content')
    <style type="text/css">
        .outras-marcas {
            background-color: #4d6a2a;
            color: white;
        }

        .outras-marcas:hover {
            color: white;
        }

        .footer-dark {
            background: linear-gradient(to right, #4d6a2a, #000000) !important;
        }

        .image-grafico-milho {
            flex: 1;
            position: relative;
            justify-content: center;
            display: flex;
        }

        .image-grafico-milho img {
            max-width: 150px;
            height: auto;
        }

        .image-grafico-milho + .image-grafico-milho::before {
            content: '';
            left: 0;
            width: 100%;
            display: flex;
            height: 50px;
            margin: 0 auto;
            border: 1px solid #396B33;
            border-radius: 30px 30px 0 0;
            border-bottom: 0 solid #fdeee2;
            position: absolute;
            top: -50px;
            padding-top: 10px;
            text-align: center;
            align-items: center;
            justify-content: center;
            transform: translateX(-50%);
        }

        .image-last:last-child::before {
            content: '';
            left: 0;
            width: 100%;
            display: flex;
            height: 50px;
            margin: 0 auto;
            border: 1px solid #396B33;
            border-top: 0 solid #fdeee2;
            border-radius: 0 0 30px 30px;
            border-bottom: 1px solid #396B33;
            position: absolute;
            top: 154px;
            padding-top: 10px;
            text-align: center;
            align-items: center;
            justify-content: center;
            transform: translateX(-50%);
        }

        .img-milho {
            max-width: 55px !important;
        }

        .imagem-sobre-card {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-scroll-sellenza">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand" title="Marca Sellenza Sementes" href="{{route('sellenza')}}">
                        <img src="{{asset('images/logo-marcas/sellenza-white.webp')}}" data-at2x="{{asset('images/logo-marcas/sellenza-white.webp')}}"
                             class="default-logo img-navbar" alt="Logo Sellenza Sementes">
                        <img src="{{asset('images/logo-marcas/sellenza.webp')}}" data-at2x="{{asset('images/logo-marcas/sellenza.webp')}}"
                             class="alt-logo img-navbar" alt="Logo Sellenza Sementes">
                        <img src="{{asset('images/logo-marcas/sellenza.webp')}}" data-at2x="{{asset('images/logo-marcas/sellenza.webp')}}"
                             class="mobile-logo img-navbar" alt="Logo Sellenza Sementes">
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

    <section class="p-0" >
        <div class="container-fluid position-relative">
            <div class="row">
                <div class="swiper-container p-0 white-move one-fifth-screen sm-h-500px lg-h-720px"
                     data-slider-options='{ "slidesPerView": 1, "loop": false, "pagination": { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "autoplay": { "delay": 4000, "disableOnInteraction": false },  "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                    <div class="swiper-wrapper">
                        <!-- start slider item -->
                        <div class="swiper-slide cover-background" style="background-image:url('{{asset("images/banner/sellenza-banner.webp")}}');">
                            <div class="opacity-75 bg-extra-dark-gray"></div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-light-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-section bg-light-green-sellenza wow animate__fadeIn" data-owl-delay="0.4s">
        <div class="container">
            <h6 class="text-green-sellenza font-weight-500">Informações técnicas do híbrido VIP3</h6>
            <div class="row align-items-center">
                <div class="col-12 col-md-3 col-xl-3">
                    <div class="">
                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">COR DO GRÃO</h6>
                            <span class="text-font-size">AMARELO ALARANJADO</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">TIPO DE GRÃO</h6>
                            <span class="text-font-size">SEMIDURO</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">P.M.G</h6>
                            <span class="text-font-size">351g</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">S. TÉRMICA</h6>
                            <span class="text-font-size">855</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">PORTE DA PLANTA</h6>
                            <span class="text-font-size">2,10m - 2,40m</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size font-weight-700">EMPALHAMENTO</h6>
                            <span class="text-font-size">EXCELENTE</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6 col-md-9 d-flex align-items-center">
                    <div class="grafico-milho">
                        <div class="image-grafico-milho">
                            <img class="border-img" src="{{asset('images/icones/grao-milho.webp')}}" alt="Imagem 1">
                        </div>
                        <div class="image-grafico-milho">
                            <img class="border-img" src="{{asset('images/icones/milho.webp')}}" alt="Imagem 2">
                        </div>
                        <div class="image-grafico-milho image-last">
                            <img class="img-milho" src="{{asset('images/icones/s.webp')}}" alt="Imagem 3">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3 col-md-12">
                    <div class="">
                        <div class="label-green">
                            <div class="text-green-sellenza margin-15px-bottom">
                                <h6 class="mb-2 text-white font-size-16">PONTO IDEAL DE SILAGEM</h6>
                                <span class="text-white font-size-16">95 / 105 DIAS</span>
                            </div>

                            <div class="text-green-sellenza">
                                <h6 class="mb-2 text-white font-size-16">TEMPO ESTIMADO PARA COLHEITA</h6>
                                <span class="text-white font-size-16">130 DIAS</span>
                            </div>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size">CICLO</h6>
                            <span class="text-font-size">PRECOCE</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size">PROLIFICIDADE</h6>
                            <span class="text-font-size">ALTA</span>
                        </div>

                        <div class="text-green-sellenza margin-15px-bottom">
                            <h6 class="mb-2 text-font-size">SABUGO</h6>
                            <span class="text-font-size">FINO</span>
                        </div>

                        <div class="text-green-sellenza">
                            <h6 class="mb-2 text-font-size">DRY WOW</h6>
                            <span class="text-font-size">ÓTIMO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-section bg-light-green-sellenza wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                    <h6 class="alt-font text-green-sellenza text-uppercase font-weight-500">
                        Novo patamar de produtividade com alta tolerância a cigarrinha-do-milho
                    </h6>

                    <p class="text-green-sellenza">
                        O poder de uma genética superior, com alta tolerância a cigarrinha-do-milho, que garante um novo patamar de produtividade. Sellenza é a nova marca de sementes de milho da Cassul Distribuidora, que chega para revolucionar o mercado de sementes.
                    </p>
                </div>

                <div class="col-12 col-xl-6 col-lg-6 col-md-6">
                    <div class="pontos-fortes">
                        <h6 class="alt-font font-weight-500 margin-five-top">PONTOS FORTES</h6>
                        <ul class="list-style-02 alt-font font-weight-500 text-small text-uppercase">
                            <li class="padding-10px-bottom border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Tolerância ao complexo de enfezamentos;
                            </li>
                            <li class="padding-10px-tb border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Excelente sanidade foliar, segurança no manejo de doenças;
                            </li>
                            <li class="padding-10px-tb border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Excelente qualidade de colmo e raiz, segurança no quebramento e tombamento;
                            </li>
                            <li class="padding-10px-tb border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Estabilidade produtiva;
                            </li>
                            <li class="padding-10px-tb border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Performance em situações de menor investimento e solos arenosos;
                            </li>
                            <li class="padding-10px-tb border-bottom border-color-medium-gray">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Maior proteção contra lagartas;
                            </li>
                            <li class="padding-10px-tb">
                                <i class="feather icon-feather-check text-large text-gradient-turquoise-green-yellowish font-weight-900 margin-10px-right"></i>
                                Stay green acentuado.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-section bg-light-green-sellenza wow animate__fadeIn" id="sobre">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-xl-4 text-center">
                    <h6 class="alt-font text-green-sellenza text-uppercase font-weight-500">
                        Nível de tolerância a cigarrinha
                    </h6>

                    <img src="{{asset('images/icones/cigarrinha.webp')}}" width="" height="" alt="Espiga de milho"/>

                    <div class="wow animate__fadeIn">
                    <span class="d-block text-green d-lg-inline-block md-margin-10px-bottom margin-five-right">
                        <i class="fas fa-circle"></i>
                        <span class="text-green-sellenza">Tolerante</span>
                    </span>


                        <span class="d-block text-red d-lg-inline-block md-margin-10px-bottom">
                        <i class="fas fa-circle"></i>
                        <span class="text-green-sellenza">Suscetível</span>
                    </span>
                    </div>

                    <div class="wow animate__fadeIn" data-wow-delay="0.4s">
                    <span class="d-block text-golden-yellow d-lg-inline-block md-margin-10px-bottom">
                        <i class="fas fa-circle"></i>
                        <span class="text-green-sellenza">Moderamente tolerante</span>
                    </span>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-xl-8 margin-top-20">
                    <h6 class="alt-font text-green-sellenza font-weight-500">TOLERÂNCIA A DOENÇAS</h6>

                    <table class="table table-bordered border-table-sellenza mb-0">
                        <thead>
                        <tr>
                            <th class="title-table" scope="col">DOENÇAS</th>
                            <th class="title-table" scope="col">MT</th>
                            <th class="title-table" scope="col">T</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th class="sub-table" scope="row">Turcicum</th>
                            <td class="preenchimento-table"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Ferrugem Comum</th>
                            <td></td>
                            <td class="preenchimento-table"></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Ferrugem Polissora</th>
                            <td></td>
                            <td class="preenchimento-table"></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Cercospora</th>
                            <td class="preenchimento-table"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Mancha Branca</th>
                            <td class="preenchimento-table"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Podridão de Grãos</th>
                            <td class="preenchimento-table"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th class="sub-table" scope="row">Enfezamento</th>
                            <td></td>
                            <td class="preenchimento-table"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="informacoes-table">
                        <span class="text-green-sellenza font-weight-900">T: Tolerante / MT: Muito Tolerante</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="min-section bg-light-green-sellenza wow animate__fadeIn" id="produtos" data-wow-delay="0.4s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-two-bottom">
                    <h6 class="alt-font text-green-sellenza font-weight-500">Os híbridos com bioteclonogia VIP3 oferecem proteção contra:</h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
                <!-- start services item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="rounded-circle w-200px h-200px border-all border-width-1px border-dashed border-color-medium-gray padding-10px-all"
                                 src="{{asset('images/pragas/lagarta-do-cartucho.webp')}}" alt="Lagarta-do-cartucho">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-green-sellenza d-inline-block font-weight-500 alt-font margin-5px-bottom">Lagarta-do-cartucho</span>
                        </div>
                    </div>
                </div>
                <!-- end services item -->
                <!-- start services item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="rounded-circle w-200px h-200px border-all border-width-1px border-dashed border-color-medium-gray padding-10px-all"
                                 src="{{asset("images/pragas/broca-do-colmo.webp")}}" alt="Broca do Colmo">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-green-sellenza d-inline-block font-weight-500 alt-font margin-5px-bottom">Broca-do-colmo</span>
                        </div>
                    </div>
                </div>
                <!-- end services item -->
                <!-- start services item -->
                <div class="col xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="rounded-circle w-200px h-200px border-all border-width-1px border-dashed border-color-medium-gray padding-10px-all"
                                 src="{{asset('images/pragas/lagarta-rosca.webp')}}" alt="Lagarta-rosca">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-green-sellenza d-inline-block font-weight-500 alt-font margin-5px-bottom">Lagarta-rosca</span>
                        </div>
                    </div>
                </div>
                <!-- end services item -->
                <!-- start services item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.8s">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="rounded-circle w-200px h-200px border-all border-width-1px border-dashed border-color-medium-gray padding-10px-all"
                                 src="{{asset('images/pragas/lagarta-da-espiga.webp')}}" alt="Lagarta-da-espiga">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-green-sellenza d-inline-block font-weight-500 alt-font margin-5px-bottom">Lagarta-da-espiga</span>
                        </div>
                    </div>
                </div>
                <div class="col wow animate__fadeIn" data-wow-delay="0.10s">
                    <div class="feature-box">
                        <div class="feature-box-icon">
                            <img class="rounded-circle w-200px h-200px border-all border-width-1px border-dashed border-color-medium-gray padding-10px-all"
                                 src="{{asset('images/pragas/lagarta-elasmo.webp')}}" alt="Lagarta-elasmo">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-green-sellenza d-inline-block font-weight-500 alt-font margin-5px-bottom">Lagarta-elasmo</span>
                        </div>
                    </div>
                </div>
                <!-- end services item -->
            </div>
        </div>
    </section>

    <section class="min-section bg-light-green-sellenza wow animate__fadeIn" data-wow-delay="0.4s">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-xl-5 wow animate__fadeIn" data-wow-delay="0.6s">
                    <h6 class="alt-font text-green-sellenza font-weight-500">POSICIONAMENTO</h6>

                    <div class="card-posicionamento">
                        <div>
                            <div class="d-flex flex-column">
                                <span class="text-green-sellenza font-weight-700">SAFRA</span>
                                <span class="text-green-sellenza font-weight-400">Safra e Safrinha</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-green-sellenza font-weight-700">REGIÃO</span>
                                <span class="text-green-sellenza font-weight-400">Centro Sul</span>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="text-green-sellenza font-weight-700">FINALIDADE</span>
                                <span class="text-green-sellenza font-weight-400">Grãos e silagem</span>
                            </div>
                        </div>

                        <div>
                            <div class="d-flex flex-column">
                                <span class="text-green-sellenza text-uppercase font-weight-700">Estados de recomendação</span>
                                <span class="text-green-sellenza font-weight-400">PR, RS, SC, MT, MS, GO, TO, SP e MG.</span>
                            </div>

                            <div class="d-flex flex-column">
                                <span class="text-green-sellenza text-uppercase font-weight-700">Época</span>
                                <span class="text-green-sellenza font-weight-400">Abertura e meio</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-xl-7 margin-top-20 wow animate__fadeIn" data-wow-delay="0.8s">
                    <h6 class="alt-font text-green-sellenza font-weight-500">SAFRA VERÃO</h6>
                    <div class="table-responsive">
                        <table class="table border-table-sellenza table-safra mb-0">
                            <thead>
                            <tr>
                                <th class="title-table background-table" scope="col">REGIÃO</th>
                                <th class="title-table background-table" scope="col">ÉPOCA</th>
                                <th class="title-table background-table" scope="col">ALTO</th>
                                <th class="title-table background-table" scope="col">MÉDIO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="tr-table-safra">
                                <th class="sub-table text-center background-table" scope="row">
                                    <p class="mb-0 mt-4">RS</p>
                                    <p class="mb-0">SC</p>
                                    <p class="mb-0">PR</p>
                                </th>
                                <td>
                                    <p class="mb-0 p-2 border-table">CEDO</p>
                                    <p class="mb-0 p-2 background-table">NORMAL</p>
                                    <p class="p-2 item-table-two">POPULAÇÃO DE PLANAS (MIL PL/HA)</p>
                                </td>
                                <td>
                                    <p class="mb-0 p-2 border-table">70.000</p>
                                    <p class="mb-0 p-2 background-table">65.000</p>
                                </td>
                                <td>
                                    <p class="mb-0 p-2">65.000</p>
                                    <p class="mb-0 p-2 item-table">60.000</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="min-section bg-light-green-sellenza wow animate__fadeIn" data-owl-delay="0.4s" style="visibility: hidden; animation-name: none; ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-12 col-md-12">
                    <h6 class="alt-font text-green-sellenza font-weight-500 wow animate__fadeIn" data-wow-delay="0.6s">
                        CARACTERÍSTICAS BROMATOLÓGICOS DA SILAGEM
                    </h6>

                    <div class="card-silagem position-relative wow animate__fadeIn" data-wow-delay="0.9s">
                        <div class="lista-informacao">
                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">%MS</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">34,15</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">PB</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">8,7</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">FDNmo</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">33,36</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Lignina</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">5,46</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Amido</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">35,42</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">pH</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">4,05</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Ac. Lático</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">3,36</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Ac. Acético</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">1,52</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Ac. Butírico</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">0</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">dFDnmo30H</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">50,2</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Dig Amido 16h</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">86,05</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">TTNDFD, % FDN</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">34,91</span>
                            </div>
                        </div>

                        <div class="lista-informacao-item-3">
                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">CNF</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">47,12</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">NDT (Milk 2006 Laticínios</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">70,12</span>
                            </div>

                            <div class="card-informacao-silagem">
                                <span class="text-green-sellenza item">Kg Leite/ton MS</span>
                                <div class="border-bottom"></div>
                                <span class="text-green-sellenza item">1628,41</span>
                            </div>

                            <div class="obs-silagem">
                                *Obs: Altura de corte 65cm
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
             style="background-image:url('{{asset('images/logo-marcas/contato-sellenza.webp')}}');">
        <div class="container xs-no-padding-lr">
            <div class="row justify-content-center justify-content-lg-end">
                <div class="col-12 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div class="text-center bg-white box-shadow-large border-radius-6px padding-5-rem-tb padding-7-rem-lr sm-padding-5-rem-all xs-padding-3-half-rem-lr xs-padding-6-rem-tb xs-no-border-radius">
                    <span class="alt-font text-medium text-gradient-sellenza text-uppercase font-weight-500 d-block margin-15px-bottom sm-margin-10px-bottom">
                        Contato
                    </span>
                        <h5 class="alt-font text-dark-charcoal font-weight-700 letter-spacing-minus-1px mb-0 w-100 mx-auto xs-w-100">
                            Entre em contato para conhecer nossos produtos Sellenza!
                        </h5>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                        <span class="title-extra-small text-gradient-sellenza alt-font">
                            (47) 99999-9999
                        </span>
                        </div>

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=5547999999999&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Sellenza."
                           class="btn btn-fancy btn-large btn-fast-blue-sellenza btn-round-edge w-100 font-size-16" title="Enviar mensagem">
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

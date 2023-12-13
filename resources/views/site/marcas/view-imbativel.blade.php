@extends('.site.includes.base-layout')

@section('title', 'Imbatível')

@section('content')
    <style type="text/css">
        .outras-marcas {
            background-color: #e12837;
            color: white;
        }

        .outras-marcas:hover {
            color: white;
        }

        .footer-dark {
            background: linear-gradient(to right, #ff0000, #000000)
        }
    </style>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-scroll-imbativel">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand" title="Marca Imbatível" href="{{route('imbativel')}}">
                        <img src="{{asset('images/logo-marcas/imbativel.webp')}}" data-at2x="{{asset('images/logo-marcas/imbativel.webp')}}"
                             class="default-logo img-navbar" alt="Logo Imbatível">
                        <img src="{{asset('images/logo-marcas/imbativel.webp')}}" data-at2x="{{asset('images/logo-marcas/imbativel.webp')}}"
                             class="alt-logo img-navbar" alt="Logo Imbatível">
                        <img src="{{asset('images/logo-marcas/imbativel.webp')}}" data-at2x="{{asset('images/logo-marcas/imbativel.webp')}}"
                             class="mobile-logo img-navbar" alt="Logo Imbatível">
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

    <section class="p-0 cover-background" style="background-image: url('{{asset('images/imbativel/banner.webp')}}');" id="home">
        <!-- <div class="opacity-medium bg-extra-dark-gray"></div> -->
        <div class="container">
            <div class="row align-items-stretch justify-content-center full-screen md-h-650px sm-h-450px">
                <div class="col-12 col-xl-8 position-relative text-center d-flex justify-content-center flex-column">
                    <!-- <h1 class="text-white alt-font text-shadow-extra-large letter-spacing-minus-4px sm-no-text-shadow">
                        Na batalha contra pragas e insetos,<br />
                        somos IMBATÍVEIS<br />
                    </h1> -->
                </div>
                <div class="down-section text-center"><a href="#about" class="section-link up-down-ani"><i class="ti-mouse icon-small text-white"></i></a></div>
            </div>
        </div>
    </section>

    <section class="bg-extra-dark-gray padding-80px-bottom" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-4 col-lg-5 col-md-6 xs-margin-30px-bottom text-center text-md-start wow animate__fadeIn" data-wow-delay="0.2s">
                    <h4 class="alt-font cd-headline slide font-weight-600 text-extra-dark-gray letter-spacing-minus-1px">
                    <span class="d-block p-0 text-white">
                        Na batalha contra pragas e insetos somos,
                    </span>
                        <span class="cd-words-wrapper d-initial p-0">
                        <b class="text-dark-red border-width-2px border-bottom border-fast-yellow letter-spacing-minus-1px is-visible">imbatíves</b>
                        <b class="text-dark-red border-width-2px border-bottom border-fast-yellow letter-spacing-minus-1px">eficientes</b>
                        <b class="text-dark-red border-width-2px border-bottom border-fast-yellow letter-spacing-minus-1px">especialistas
                        </b>
                    </span>
                    </h4>
                </div>
                <div id="sobre" class="col-12 col-xl-5 offset-xl-2 col-md-6 offset-lg-1 text-center text-md-start last-paragraph-no-margin wow animate__fadeIn"
                     data-wow-delay="0.4s">
                <span class="alt-font font-weight-600 text-white text-uppercase d-block margin-15px-bottom">
                    Sobre a Imbatível
                </span>
                    <p class="text-extra-medium w-95 line-height-36px md-w-100">
                        A marca Imbatível está inserida no mercado de domissanitários desde 2013
                        Disponibilizamos ao mercado, produtos de alta qualidade, seguros e com eficácia garantida!
                    </p>
                    <p class="text-extra-medium w-95 line-height-36px md-w-100">
                        Com um amplo portfólio de produtos, atendemos demandas profissionais e domésticas,
                        oferecendo soluções inteligentes para o controle de pragas e insetos.
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center margin-3-rem-top md-margin-6-rem-top">
                <!-- start feature box item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="feather icon-feather-check-circle align-middle icon-small text-white margin-15px-right"></i>
                        <span class="alt-font font-weight-500 text-uppercase">Eficácia Comprovada</span>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.3s">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="feather icon-feather-trending-up align-middle icon-small text-white margin-15px-right"></i>
                        <span class="alt-font font-weight-500 text-uppercase">Inovação Contínua</span>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="feather icon-feather-lock align-middle icon-small text-white margin-15px-right"></i>
                        <span class="alt-font font-weight-500 text-uppercase">Segurança e Qualidade</span>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.5s">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <i class="feather icon-feather-sun align-middle icon-small text-white margin-15px-right"></i>
                        <span class="alt-font font-weight-500 text-uppercase">Compromisso Ambiental</span>
                    </div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>

    <section class="big-section bg-white lg-padding-20px-lr xs-no-padding-lr" id="produtos">
        <div class="container-fluid padding-30px-lr xs-padding-15px-lr">
            <div class="row justify-content-center">
                <!-- start interactive banner item -->
                <div class="col-12 col-xl-3 col-md-6 col-sm-8 interactive-banners-style-09 lg-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn"
                     data-wow-delay="0.2s">
                    <figure class="m-0">
                        <img class="w-100" src="{{asset('images/imbativel/produto1.webp')}}" alt="Cupincidas" />
                        <div class="opacity-light bg-extra-dark-gray"></div>
                        <div class="interactive-banners-overlay bg-imbativel"></div>
                        <figcaption>
                            <div class="interactive-banners-content align-items-start padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin xl-padding-2-rem-all lg-padding-4-rem-all xs-padding-5-rem-all">
                                <h5 class="alt-font font-weight-600 text-white position-relative z-index-1">Cupincidas</h5>
                                <span class="interactive-banners-hover-icon"><i class="line-icon-Hand-Touch text-white icon-large"></i></span>
                            </div>
                            <div class="interactive-banners-hover-action align-items-end d-flex">
                                <div class="padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin lg-padding-4-rem-all xl-padding-3-rem-all xs-padding-5-rem-all">
                                    <p class="interactive-banners-action-content text-extra-medium line-height-34px w-80 text-white opacity-5 lg-w-70">
                                        Desfrute de um ambiente sem preocupações, preservando a qualidade e a durabilidade de seus bens.
                                    </p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end interactive banner item -->
                <!-- start interactive banner item -->
                <div class="col-12 col-xl-3 col-md-6 col-sm-8 interactive-banners-style-09 lg-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                    <figure class="m-0">
                        <img class="w-100" src="{{asset('images/imbativel/produto2.webp')}}" alt="Herbicidas" />
                        <div class="opacity-light bg-extra-dark-gray"></div>
                        <div class="interactive-banners-overlay bg-imbativel"></div>
                        <figcaption>
                            <div class="interactive-banners-content align-items-start padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin xl-padding-2-rem-all lg-padding-4-rem-all xs-padding-5-rem-all">
                                <h5 class="alt-font font-weight-600 text-white position-relative z-index-1">Herbicidas</h5>
                                <span class="interactive-banners-hover-icon"><i class="line-icon-Hand-Touch text-white icon-large"></i></span>
                            </div>
                            <div class="interactive-banners-hover-action align-items-end d-flex">
                                <div class="padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin lg-padding-4-rem-all xl-padding-3-rem-all xs-padding-5-rem-all">
                                    <p class="interactive-banners-action-content text-extra-medium line-height-34px w-80 text-white opacity-5 lg-w-70">
                                        Diga adeus às ervas daninhas e dê as boas-vindas a um espaço verde impecável.
                                    </p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end interactive banner item -->
                <!-- start interactive banner item -->
                <div class="col-12 col-xl-3 col-md-6 col-sm-8 interactive-banners-style-09 sm-margin-30px-bottom xs-margin-15px-bottom wow animate__fadeIn" data-wow-delay="0.6s">
                    <figure class="m-0">
                        <img class="w-100" src="{{asset('images/imbativel/produto3.webp')}}" alt="Inseticidas" />
                        <div class="opacity-light bg-extra-dark-gray"></div>
                        <div class="interactive-banners-overlay bg-imbativel"></div>
                        <figcaption>
                            <div class="interactive-banners-content align-items-start padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin xl-padding-2-rem-all lg-padding-4-rem-all xs-padding-5-rem-all">
                                <h5 class="alt-font font-weight-600 text-white position-relative z-index-1">Inseticidas</h5>
                                <span class="interactive-banners-hover-icon"><i class="line-icon-Hand-Touch text-white icon-large"></i></span>
                            </div>
                            <div class="interactive-banners-hover-action align-items-end d-flex">
                                <div class="padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin lg-padding-4-rem-all xl-padding-3-rem-all xs-padding-5-rem-all">
                                    <p class="interactive-banners-action-content text-extra-medium line-height-34px w-80 text-white opacity-5 lg-w-70">
                                        Conquiste o controle total contra insetos indesejados!
                                    </p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end interactive banner item -->
                <!-- start interactive banner item -->
                <div class="col-12 col-xl-3 col-md-6 col-sm-8 interactive-banners-style-09 wow animate__fadeIn" data-wow-delay="0.8s">
                    <figure class="m-0">
                        <img class="w-100" src="{{asset('images/imbativel/produto4.webp')}}" alt="Lesmicidas" />
                        <div class="opacity-light bg-extra-dark-gray"></div>
                        <div class="interactive-banners-overlay bg-imbativel"></div>
                        <figcaption>
                            <div class="interactive-banners-content align-items-start padding-4-half-rem-lr padding-5-rem-tb last-paragraph-no-margin xl-padding-2-rem-all lg-padding-4-rem-all xs-padding-5-rem-all">
                                <h5 class="alt-font font-weight-600 text-white position-relative z-index-1">Lesmicidas</h5>
                                <span class="interactive-banners-hover-icon"><i class="line-icon-Hand-Touch text-white icon-large"></i></span>
                            </div>
                            <div class="interactive-banners-hover-action align-items-end d-flex">
                                <div class="padding-4-half-rem-lr padding-5-rem-tb lg-padding-4-rem-all last-paragraph-no-margin xl-padding-3-rem-all xs-padding-5-rem-all">
                                    <p class="interactive-banners-action-content text-extra-medium line-height-34px w-80 text-white opacity-5 lg-w-70">
                                        Nosso poderoso eliminador de lesmas é a fórmula eficaz para proteger suas plantas, garantindo um ambiente exuberante e livre de invasores.
                                    </p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <!-- end interactive banner item -->
            </div>
        </div>
    </section>

    <section class="bg-extra-dark-gray big-section border-top border-color-white-transparent" id="contact">
        <div class="container">
            <div class="row margin-6-rem-bottom md-margin-5-rem-bottom align-items-center">
                <div class="col-12 col-lg-6 col-md-7 text-center text-md-start sm-margin-10px-bottom wow animate__fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <h5 class="alt-font font-weight-600 text-white text-uppercase margin-5px-bottom letter-spacing-minus-1px">No combate contra</h5>
                    <p class="m-0 d-block">todos os invasores</p>
                </div>
                <div class="col-12 col-lg-6 col-md-5 text-center text-md-end wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <a href="#" class="btn btn-link btn-extra-large text-white text-extra-dark-gray-hover">Visualizar todos os produtos</a>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/mosquicidas.webp')}}" alt="Mosquicidas" class="text-fast-yellow margin-25px-bottom">
                                <!-- <i class="line-icon-Mail-Read d-block icon-medium text-fast-yellow margin-25px-bottom"></i> -->
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Mosquicidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Proteja sua casa com o poder eficaz dos nossos mosquicidas. A solução definitiva para um ambiente livre de moscas e tranquilo para você!</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/formicidas.webp')}}" alt="Formicidas" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Formicidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Nossos formicidas são a resposta eficaz para proteger seu lar, eliminando as trilhas indesejadas e mantendo sua casa livre de invasores.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/inseticidas.webp')}}" alt="Inseticidas" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Inseticidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Conquiste o controle total contra insetos indesejados! Nossos inseticidas oferecem uma defesa imbatível, garantindo um ambiente seguro, sem preocupações e livre de pragas.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
            </div>
            <div class="row justify-content-center">
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/raticidas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                                <!-- <i class="line-icon-Mail-Read d-block icon-medium text-fast-yellow margin-25px-bottom"></i> -->
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Raticidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Proteja seu espaço com nossa arma secreta contra roedores indesejados! Nosso produto anti-ratos é a garantia de um ambiente seguro.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/cupincidas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Cupincidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Desfrute de um ambiente sem preocupações, preservando a qualidade e a durabilidade de seus bens. Defenda-se com eficácia, escolha a confiança contra os cupins!</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/lesmicidas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Lesmicidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Nosso poderoso eliminador de lesmas é a fórmula eficaz para proteger suas plantas, garantindo um ambiente exuberante e livre de invasores.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
            </div>
            <div class="row justify-content-center">
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/pulgas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                                <!-- <i class="line-icon-Mail-Read d-block icon-medium text-fast-yellow margin-25px-bottom"></i> -->
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Pó para Pulgas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Liberte-se das preocupações e proporcione ao seu lar a paz que ele merece. Experimente a solução confiável contra pulgas, agora ao alcance das suas mãos!</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/baraticidas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Baraticidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Elimine baratas com facilidade! O baraticida que você precisa para manter seu ambiente limpo e seguro.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="{{asset('images/imbativel/icones/herbicidas.webp')}}" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Herbicidas</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Diga adeus às ervas daninhas e dê as boas-vindas a um espaço verde impecável. A solução eficaz para um jardim exuberante está ao seu alcance!</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
            </div>
            <div class="row justify-content-center">
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="https://via.placeholder.com/80x80" alt="" class="text-fast-yellow margin-25px-bottom">
                                <!-- <i class="line-icon-Mail-Read d-block icon-medium text-fast-yellow margin-25px-bottom"></i> -->
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">Repelentes</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>Afaste os insetos indesejados com eficácia! Descubra a solução definitiva para desfrutar de momentos ao ar livre sem preocupações.</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8 md-margin-30px-bottom xs-margin-15px-bottom">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="https://via.placeholder.com/80x80" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">XXXXXXXX</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>XXXXX</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
                <!-- start text box item -->
                <div class="col-12 col-lg-4 col-md-6 col-sm-8">
                    <div class="feature-box feature-box-hide-show-hover border-radius-6px overflow-hidden">
                        <div class="feature-box-move-bottom-top padding-5-rem-lr padding-15px-tb lg-padding-2-half-rem-lr md-padding-4-half-rem-lr">
                            <div class="feature-box-icon">
                                <img src="https://via.placeholder.com/80x80" alt="" class="text-fast-yellow margin-25px-bottom">
                            </div>
                            <div class="feature-box-content last-paragraph-no-margin">
                                <span class="text-white text-extra-medium d-block alt-font font-weight-500">XXXXXXX</span>
                            </div>
                            <div class="move-bottom-top margin-10px-top last-paragraph-no-margin">
                                <p>XXXXX</p>
                            </div>
                        </div>
                        <div class="feature-box-overlay"></div>
                    </div>
                </div>
                <!-- end text box item -->
            </div>
        </div>
    </section>

    <div class="wow animate__fadeIn bg-extra-dark-gray" id="encontrar">
        <iframe class="w-100 h-500px filter-mix-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.214706465866!2d-52.2887649!3d-27.
                    6770076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e31450f48bca91%3A0x78276bf6d5c94f17!2sCassul%20Distribuidora!5e0!3m2!1spt-BR!2sbr!
                    4v1699463687045!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <section id="contato" class="cover-background bg-extra-dark-gray big-section xs-no-padding-tb xs-border-tb border-color-medium-gray wow animate__fadeIn"
             style="background-image:url('{{asset('images/imbativel/banner-contato.webp')}}');">
        <div class="container xs-no-padding-lr">
            <div class="row justify-content-center justify-content-center">
                <div class="col-12 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div class="text-center bg-white box-shadow-large border-radius-6px padding-5-rem-tb padding-7-rem-lr sm-padding-5-rem-all xs-padding-3-half-rem-lr xs-padding-6-rem-tb xs-no-border-radius">
                    <span class="alt-font text-medium text-gradient-red text-uppercase font-weight-500 d-block margin-15px-bottom sm-margin-10px-bottom">
                        Contato
                    </span>
                        <h5 class="alt-font text-dark-charcoal font-weight-700 letter-spacing-minus-1px mb-0 w-100 mx-auto xs-w-100">
                            Conheça nossos produtos imbativeis!
                        </h5>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                        <span class="title-extra-small text-gradient-red alt-font">
                            (47) 99999-9999
                        </span>
                        </div>

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=5547999999999&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Imbatível."
                           class="btn btn-fancy btn-large btn-fast-red btn-round-edge w-100 font-size-16" title="Enviar mensagem">
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

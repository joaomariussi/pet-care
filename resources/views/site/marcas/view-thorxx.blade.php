@extends('.site.includes.base-layout')

@section('title', 'Thorxx')

@section('description', 'A Thorxx busca através de seus produtos trazer para o mercado soluções de alta performance, que vão desde ferragens e ferramentas manuais para uso agrícola e jardinagem, até uma linha completa de instrumentos para a construção civil')

@section('content')
    <style type="text/css">
        .outras-marcas {
            background-color: #ff0914;
            color: white;
        }

        .outras-marcas:hover {
            color: white;
        }

        .footer-dark {
            background: linear-gradient(to right, #ff0000, #000000) !important;
        }
    </style>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-scroll-thorxx">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand" title="Marca Thorxx" href="{{route('thorxx')}}">
                        <img src="{{asset('images/logo-marcas/thorxx.webp')}}" data-at2x="{{asset('images/logo-marcas/thorxx.webp')}}"
                             class="default-logo img-navbar" alt="Logo Thorxx">
                        <img src="{{asset('images/logo-marcas/thorxx.webp')}}" data-at2x="{{asset('images/logo-marcas/thorxx.webp')}}"
                             class="alt-logo img-navbar" alt="Logo Thorxx">
                        <img src="{{asset('images/logo-marcas/thorxx.webp')}}" data-at2x="{{asset('images/logo-marcas/thorxx.webp')}}"
                             class="mobile-logo img-navbar" alt="Logo Thorxx">
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
    <!-- end header -->
    <!-- start page title -->
    <section class="parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('{{asset('images/thorxx/banner-principal.webp')}}');">
        <div class="opacity-extra-medium bg-extra-dark-gray"></div>
        <div class="container">
            <div class="row align-items-stretch justify-content-center small-screen">
                <div class="col-12 col-xl-6 col-lg-7 col-md-8 position-relative page-title-extra-small text-center d-flex justify-content-center flex-column">
                    <h1 class="alt-font text-white opacity-6 margin-20px-bottom">
                        Thorxx
                    </h1>
                    <h2 class="text-white alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom">
                        Soluções para o seu dia a dia
                    </h2>
                </div>
                <div class="down-section text-center"><a href="#down-section" class="section-link"><i class="ti-arrow-down icon-extra-small text-white bg-transparent-red padding-15px-all xs-padding-10px-all border-radius-100"></i></a></div>
            </div>
        </div>
    </section>
    <!-- end page title -->
    <!-- start section -->
    <section id="down-section">
        <div class="container" id="sobre">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 position-relative sm-margin-30px-bottom">
                    <img class="border-radius-5px" src="{{asset('images/thorxx/produto.webp')}}" alt="" />
                </div>
                <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                    <h5 class="alt-font font-weight-500 text-extra-dark-gray w-90">
                        Thorxx
                    </h5>
                    <p class="w-85 lg-w-90">
                        Comprometida com a qualidade e eficiência, a Thorxx transforma necessidades em soluções.
                        Essa é a nossa filosofia. Transformar o dia a dia das pessoas, tornando-o mais fácil, eficiente e produtivo.
                        Especializada no segmento de ferragens, a Thorxx busca através de seus produtos trazer para o mercado soluções de
                        alta performance, que vão desde ferragens e ferramentas manuais para uso agrícola e jardinagem, até uma linha completa
                        de instrumentos para a construção civil.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->
    <section class="bg-light-gray wow animate__fadeIn" id="produtos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 text-center margin-3-rem-bottom">
                    <span class="alt-font margin-5px-bottom d-inline-block text-uppercase font-weight-500 text-medium-gray">Linha de Produtos</span>
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">
                        Cada produto do nosso portfólio é estudado em todos os detalhes para que corresponda de forma precisa à sua função, com máxima performance,
                        sempre em conformidade com normas de segurança e legislações específicas de cada área.
                    </h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Alpha icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Fios Eletroplásticos
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Aquarius icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray text-gradient-orange-pink-hover d-block margin-5px-bottom font-weight-500">
                                Arame
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Background icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Telas
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Engineering icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Cordas
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Spray icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray text-gradient-orange-pink-hover d-block margin-5px-bottom font-weight-500">
                                Pulverizadores
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Gear-2 icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Peças Pulverizadores
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>

                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Belt icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Cinto & Bainha de Couro Thorxx
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>

                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Shoes-2 icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                               Botinas
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>

                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Environmental icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Garden
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>

                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Flowerpot icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Regador
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>

                <div class="col wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box feature-box-shadow padding-twenty-tb padding-twelve-lr xs-padding-fifteen-tb xs-padding-eight-lr">
                        <div class="feature-box-icon">
                            <i class="line-icon-Gear-2 icon-medium text-gradient-light-purple-light-orange margin-40px-bottom md-margin-20px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-extra-medium alt-font text-extra-dark-gray d-block margin-5px-bottom font-weight-500">
                                Mangueira
                            </span>
                        </div>
                        <div class="feature-box-overlay bg-white border-radius-5px"></div>
                    </div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start section -->

    <div class="wow animate__backInDown" id="encontrar">
        <iframe class="w-100 h-500px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.214706465866!2d-52.2887649!3d-27.
                    6770076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e31450f48bca91%3A0x78276bf6d5c94f17!2sCassul%20Distribuidora!5e0!3m2!1spt-BR!2sbr!
                    4v1699463687045!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <section id="contato" class="cover-background bg-extra-dark-gray big-section xs-no-padding-tb xs-border-tb border-color-medium-gray wow animate__fadeIn"
             style="background-image:url('{{asset('images/thorxx/banner-contato.webp')}}');">
        <div class="container xs-no-padding-lr">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div class="text-center bg-white box-shadow-large border-radius-6px padding-5-rem-tb padding-7-rem-lr sm-padding-5-rem-all xs-padding-3-half-rem-lr xs-padding-6-rem-tb xs-no-border-radius">
                    <span class="alt-font text-medium text-gradient-red text-uppercase font-weight-500 d-block margin-15px-bottom sm-margin-10px-bottom">
                        Contato
                    </span>
                        <h5 class="alt-font text-dark-charcoal font-weight-700 letter-spacing-minus-1px mb-0 w-100 mx-auto xs-w-100">
                            Entre em contato conosco, para mais informações sobre os produtos Thorxx.
                        </h5>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                            <span class="title-extra-small text-gradient-red alt-font">
                                (54) 3520-1500
                            </span>
                        </div>

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=555435201500&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20Thorxx."
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

<!-- start header -->


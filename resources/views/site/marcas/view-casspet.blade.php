@extends('site.includes.base-layout')

@section('title', 'Casspet')

@section('content')
    <style type="text/css">
        .outras-marcas {
            background-color: #efb82c;
            color: white;
        }

        .outras-marcas:hover {
            color: white;
        }

        .footer-dark {
            background: linear-gradient(to right, #efb82c, #000000) !important;
        }
    </style>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent header-light fixed-top navbar-boxed header-reverse-scroll nav-scroll">
            <div class="container-fluid nav-header-container">
                <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                    <a class="navbar-brand" title="Marca Casspet" href="{{route('casspet')}}">
                        <img src="{{asset('images/logo-marcas/casspet-logo.webp')}}" data-at2x="{{asset('images/logo-marcas/casspet-logo.webp')}}"
                             class="default-logo img-navbar" alt="Logo Casspet">
                        <img src="{{asset('images/logo-marcas/casspet-logo.webp')}}" data-at2x="{{asset('images/logo-marcas/casspet-logo.webp')}}"
                             class="alt-logo img-navbar" alt="Logo Casspet">
                        <img src="{{asset('images/logo-marcas/casspet-logo.webp')}}" data-at2x="{{asset('images/logo-marcas/casspet-logo.webp')}}"
                             class="mobile-logo img-navbar" alt="Logo Casspet">
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

    <section class="p-0 one-fifth-screen sm-h-450px xs-h-350px cover-background d-flex align-items-end"
             style="background-image: url('{{asset('images/banner-marcas-proprias/casspet-principal.webp')}}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-6 text-center">
                    <span class="separator-line-vertical w-100px h-1px d-inline-block align-middle bg-dark-yellow xs-w-60px"></span>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-5 col-md-9 md-margin-7-rem-bottom">
                        <span class="alt-font margin-20px-bottom text-gradient-yellow d-inline-block text-uppercase font-weight-500 letter-spacing-1px">
                            Conheça a Casspet
                        </span>
                    <h1 class="alt-font title-extra-small font-weight-600 text-extra-dark-gray w-95">
                        Nossa filosofia!
                    </h1>
                    <p class="w-80 lg-w-95">
                        A Casspet foi criada tendo como princípios básicos a saúde, o bem-estar e a interação dos pets com seus “serumaninhos”.
                        Nós, da Casspet, acreditamos que cães e gatos são mais que animais de estimação: são companheiros para todos os momentos.
                        Entre refeições, passeios, banhos e brincadeiras podemos demonstrar e retribuir o carinho que nossos pets nos oferecem.
                    </p>
                    <p class="w-80 lg-w-95">
                        A marca Casspet está inserida no mercado desde 2002. Atua em 3 segmentos,
                        com um amplo portfólio de produtos para as linhas Food, Beauty and Care e Fun.
                    </p>
                </div>
                <div class="col-12 col-lg-7 col-md-9 padding-55px-lr md-padding-5px-left sm-padding-50px-right">
                    <figure class="image-back-offset-shadow position-right w-100">
                        <img class="border-radius-6px" src="{{asset('images/banner/casspet-sobre.jpg')}}" alt="Sobre a Casspet"/>
                        <span class="bg-gradient-casspet-yellow border-radius-6px overlay"></span>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray" id="produtos">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center margin-five-bottom">
                    <h6 class="alt-font text-extra-dark-gray font-weight-500">
                        Conheça nossa linha de produtos!
                    </h6>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
                <!-- start services item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                    <div class="feature-box">
                        <div class="feature-box-icon margin-30px-bottom md-margin-30px-bottom">
                            <img class="img-linhas"
                                 src="{{asset('images/catalogos/linha-food.png')}}" alt="Linha Food">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-dark-purple d-inline-block font-weight-500 alt-font margin-5px-bottom">LINHA FOOD</span>
                            <p class="mx-auto xs-w-75 text-container">
                                    <span class="text-full">
                                        Completa linha de alimentos saudáveis e balanceados para cães e gatos, atendendo às necessidades físicas e nutricionais de seu pet,
                                        respeitando as características próprias de cada um, como: tamanho, idade, atividade física, condições fisiológicas e sensibilidade.
                                        Oferecer a alimentação adequada vai resultar em mais saúde, permitindo uma maior longevidade.
                                    </span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-fancy btn-medium btn-dark-gray" href="">
                            Todos Produtos Cassul
                        </a>
                    </div>
                </div>
                <!-- end services item -->
                <!-- start services item -->
                <div class="col md-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                    <div class="feature-box">
                        <div class="feature-box-icon margin-30px-bottom md-margin-30px-bottom">
                            <img class="img-linhas"
                                 src="{{asset('images/catalogos/linha-beauty.png')}}" alt="Linha Beauty">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-dark-purple d-inline-block font-weight-500 alt-font margin-5px-bottom">LINHA BEAUTY AND CARE</span>
                            <p class="mx-auto xs-w-75 text-container">
                                    <span class="text-full">
                                        A Beauty and Care é a linha de higiene e beleza da Casspet. São produtos desenvolvidos com o mais absoluto cuidado, pois são responsáveis por duas áreas
                                    importantes na criação do seu pet. Manter a higiene requer produtos de alta qualidade, testados em laboratório para oferecer proteção e
                                    segurança na medida certa, além de deixar seu pet muito mais fofinho e cheiroso.
                                    </span>

                            </p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-fancy btn-medium btn-dark-gray" href="#">
                            Catálogo de produtos
                        </a>
                    </div>
                </div>
                <!-- end services item -->
                <!-- start services item -->
                <div class="col xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.6s">
                    <div class="feature-box">
                        <div class="feature-box-icon margin-30px-bottom md-margin-30px-bottom">
                            <img class="img-linhas"
                                 src="{{asset('images/catalogos/linha-fun.png')}}" alt="Linha Fun">
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="text-dark-purple d-inline-block font-weight-500 alt-font margin-5px-bottom">LINHA FUN</span>
                            <p class="mx-auto xs-w-75 text-container">
                                    <span class="text-full">
                                        Pensar no bem-estar do seu pet também é pensar em maneiras de tornar o dia a dia dele mais divertido.
                                        É cientificamente comprovado que os animais possuem emoções. Por isso oferecer atrativos que os envolvam podem aliviar
                                        o stress e tornar seu pet muito mais alegre. Além de brinquedos, a linha FUN também conta com completa e diferenciada
                                        linha de acessórios como: coleiras, bebedouros, comedouros, casinhas, caminhas e muito mais.
                                    </span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-fancy btn-medium btn-dark-gray mt-3" href="#">
                            Catálogo linha fun
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="parallax overflow-visible wow animate__fadeIn" id="services" data-parallax-background-ratio="0.1"
             style="background-image: url('{{asset('images/our-services-17.png')}}');">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-7 col-lg-8 col-md-12 md-margin-40px-bottom">
                    <div class="row">
                        <div class="col-12 position-relative margin-5-half-rem-bottom sm-margin-7-half-rem-bottom">
                            <span class="alt-font margin-20px-bottom text-gradient-yellow d-inline-block text-uppercase font-weight-500 letter-spacing-1px">
                                Quais produtos possuímos</span>
                            <h5 class="alt-font font-weight-600 text-extra-dark-gray">Conheça toda a linha de produtos Casspet</h5>
                            <p class="w-80 margin-4-half-rem-bottom md-w-100">Descubra o mundo encantador da CassPet e proporcione o melhor para o seu companheiro de quatro patas. Explore nossa gama exclusiva de produtos pensados com carinho para atender às necessidades do seu pet. Venha conhecer o que há de mais especial para o seu amigo.</p>
                            <div class="swiper-button-next-nav swiper-button-next slider-navigation-style-03 rounded-circle"><i class="feather icon-feather-arrow-right"></i></div>
                            <div class="swiper-button-previous-nav swiper-button-prev slider-navigation-style-03 rounded-circle"><i class="feather icon-feather-arrow-left"></i></div>
                        </div>
                        <div class="col-12">
                            <!-- start slider -->
                            <div class="swiper-container black-move" data-slider-options='{ "slidesPerView": 1, "loop": true, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                                <div class="swiper-wrapper">
                                    <!-- start slider item -->
                                    <div class="swiper-slide">
                                        <div class="border-all border-width-1px border-color-medium-gray border-radius-4px overflow-hidden margin-5px-right xs-no-margin-right">
                                            <div class="row g-0 row-cols-1 row-cols-sm-2">
                                                <div class="col cover-background xs-h-250px"
                                                     style="background-image: url('{{asset('images/banner-marcas-proprias/produtos-casspet/pote.jpg')}}')"></div>
                                                <div class="col">
                                                    <div class="padding-4-rem-all lg-padding-3-rem-all">
                                                        <span class="alt-font text-extra-dark-gray font-weight-500 d-inline-block margin-15px-bottom text-extra-medium">Comedouro</span>
                                                        <p>Alimente o amor com praticidade e estilo! Conheça os comedouros CassPet, perfeitos para tornar a hora da refeição do seu pet ainda mais especial.</p>
                                                        <a href="#" class="btn btn-very-small btn-round-edge btn-orange">Conheça</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end slider item -->
                                    <!-- start slider item -->
                                    <div class="swiper-slide">
                                        <div class="border-all border-width-1px border-color-medium-gray border-radius-4px overflow-hidden margin-5px-right xs-no-margin-right">
                                            <div class="row g-0 row-cols-1 row-cols-sm-2">
                                                <div class="col cover-background xs-h-250px"
                                                     style="background-image: url('{{asset('images/banner-marcas-proprias/produtos-casspet/bebedouro.jpg')}}')"></div>
                                                <div class="col">
                                                    <div class="padding-4-rem-all lg-padding-3-rem-all">
                                                        <span class="alt-font text-extra-dark-gray font-weight-500 d-inline-block margin-15px-bottom text-extra-medium">Bebedouros</span>
                                                        <p>Refresque o dia do seu pet com o Bebedouro CassPet, a fonte de hidratação perfeita para o seu companheiro. Mantenha-o sempre hidratado com água fresca e limpa.</p>
                                                        <a href="#" class="btn btn-very-small btn-round-edge btn-orange">Saiba mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end slider item -->
                                    <!-- start slider item -->
                                    <div class="swiper-slide">
                                        <div class="border-all border-width-1px border-color-medium-gray border-radius-4px overflow-hidden margin-5px-right xs-no-margin-right">
                                            <div class="row g-0 row-cols-1 row-cols-sm-2">
                                                <div class="col cover-background xs-h-250px"
                                                     style="background-image: url('{{asset('images/banner-marcas-proprias/produtos-casspet/shampoo.jpg')}}')"></div>
                                                <div class="col">
                                                    <div class="padding-4-rem-all lg-padding-3-rem-all">
                                                        <span class="alt-font text-extra-dark-gray font-weight-500 d-inline-block margin-15px-bottom text-extra-medium">Shampoo e Condicionador</span>
                                                        <p>Deixe o pelo do seu companheiro brilhar com saúde e vitalidade! Descubra a linha de shampoo e condicionador CassPet, formulada especialmente para cuidar da beleza e bem-estar do seu pet.</p>
                                                        <a href="#" class="btn btn-very-small btn-round-edge btn-orange">Saiba mais</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end slider item -->
                                    <!-- start slider item -->
                                    <div class="swiper-slide">
                                        <div class="border-all border-width-1px border-color-medium-gray border-radius-4px overflow-hidden margin-5px-right xs-no-margin-right">
                                            <div class="row g-0 row-cols-1 row-cols-sm-2">
                                                <div class="col cover-background xs-h-250px"
                                                     style="background-image: url('{{asset('images/banner-marcas-proprias/produtos-casspet/racao.jpg')}}')"></div>
                                                <div class="col">
                                                    <div class="padding-4-rem-all lg-padding-3-rem-all">
                                                        <span class="alt-font text-extra-dark-gray font-weight-500 d-inline-block margin-15px-bottom text-extra-medium">Rações</span>
                                                        <p>Nutrição completa e amor em cada grão. Escolha a ração Casspet para proporcionar ao seu melhor amigo uma vida saudável e cheia de energia.</p>
                                                        <a href="#" class="btn btn-very-small btn-round-edge btn-orange">Conheça</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end slider item -->
                                </div>
                            </div>
                            <!-- end slider -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-12 offset-xl-1">
                    <div class="sticky-top lg-position-relative">
                        <div class="bg-gradient-casspet-yellow w-100 overflow-hidden border-radius-4px padding-2-rem-all lg-padding-3-rem-all md-padding-2-rem-all position-relative" >
                            <i class="line-icon-Dog title-extra-large-heavy text-extra-dark-gray opacity-2 position-absolute top-minus-20px left-minus-30px"></i>
                            <h6 class="alt-font font-weight-500 text-white margin-35px-bottom sm-margin-15px-bottom position-relative z-index-1">Tudo que o seu PET precisa</h6>
                            <ul class="list-style-03 alt-font text-white">
                                <li class="border-color-dark-white-transparent mb-0">Rações / Bifinhos / Molhos</li>
                                <li class="border-color-dark-white-transparent mb-0">Comedouros / Bebedouros</li>
                                <li class="border-color-dark-white-transparent mb-0">Shampoos / Condicionadores / Colônias</li>
                                <li class="border-color-dark-white-transparent mb-0">Educadores / Lenço Umedecido</li>
                                <li class="border-color-dark-white-transparent mb-0">Areia / Sílica / Tapetes Higiênicos</li>
                                <li class="border-color-dark-white-transparent mb-0">Casinhas / Camas</li>
                                <li class="border-color-dark-white-transparent mb-0">Coleiras / Roupas / Brinquedos</li>
                            </ul>
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

    <section id="contato" class="cover-background big-section xs-no-padding-tb xs-border-tb border-color-medium-gray wow animate__fadeIn"
             style="background-image:url('{{asset('images/banner-marcas-proprias/rodape-casspet.jpg')}}');">
        <div class="container xs-no-padding-lr">
            <div class="row justify-content-center justify-content-lg-end">
                <div class="col-12 col-xl-7 col-lg-7 col-md-9 col-sm-11">
                    <div class="text-center bg-white box-shadow-large border-radius-6px padding-5-rem-tb padding-7-rem-lr sm-padding-5-rem-all xs-padding-3-half-rem-lr xs-padding-6-rem-tb xs-no-border-radius">
                            <span class="alt-font text-medium text-gradient-yellow text-uppercase font-weight-500 d-block margin-15px-bottom sm-margin-10px-bottom">
                                Contato
                            </span>
                        <h5 class="alt-font text-dark-charcoal font-weight-700 letter-spacing-minus-1px mb-0 w-100 mx-auto xs-w-100">
                            Saiba mais sobre os produtos da Casspet!
                        </h5>

                        <div class="d-flex align-items-center justify-content-center mt-3 mb-3">
                                <span class="title-extra-small text-gradient-yellow alt-font">
                                    (47) 99999-9999
                                </span>
                        </div>

                        <a target="_blank" href="https://api.whatsapp.com/send?phone=5547999999999&text=Ol%C3%A1%2C%20gostaria%20de%20saber%20mais%20sobre%20os%20produtos%20da%20Casspet."
                           class="btn btn-fancy btn-large btn-fast-yellow btn-round-edge w-100 font-size-16" title="Enviar mensagem">
                            <i class="fab fa-whatsapp"></i> Enviar mensagem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.view-marcas')
    @include('site.includes.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const textContainers = document.querySelectorAll(".text-container");

            textContainers.forEach(function (textContainer) {
                const textFull = textContainer.querySelector(".text-full").textContent;
                const maxLength = 125;
                const ellipsis = "...";

                if (textFull.length > maxLength) {
                    const textToShow = textFull.substring(0, maxLength);
                    const textToHide = textFull.substring(maxLength);

                    const paragraph = document.createElement("p");
                    paragraph.classList.add("text-cut");
                    paragraph.textContent = textToShow + ellipsis;

                    const readMoreLink = document.createElement("a");
                    readMoreLink.setAttribute("href", "#");
                    readMoreLink.textContent = " Ler mais";
                    readMoreLink.style.color = "#efb82c";
                    readMoreLink.addEventListener("click", function (event) {
                        event.preventDefault();
                        paragraph.textContent = textToShow + textToHide + " ";
                        paragraph.appendChild(readLessLink);
                    });

                    const readLessLink = document.createElement("a");
                    readLessLink.setAttribute("href", "#");
                    readLessLink.textContent = "Ler menos";
                    readLessLink.style.color = "#f36e4a";
                    readLessLink.addEventListener("click", function (event) {
                        event.preventDefault();
                        paragraph.textContent = textToShow + ellipsis + " ";
                        paragraph.appendChild(readMoreLink);
                    });

                    paragraph.appendChild(readMoreLink);
                    textContainer.innerHTML = ""; // Limpa o conteúdo original
                    textContainer.appendChild(paragraph);
                }
            });
        });
    </script>
@endsection

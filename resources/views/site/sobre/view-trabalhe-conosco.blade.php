@extends('site.includes.base-layout')

@section('title', 'Trabalhe Conosco')

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
                            <li class="nav-item">
                                <a href="#" class="nav-link">Produtos</a>
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
                            <li class="nav-item">
                                <a href="#" class="nav-link">Loja Online</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contato-geral')}}" title="Contato Cassul Distribuidora" class="nav-link">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trabalhe-conosco')}}" title="Trabalha Conosco" class="nav-link active">Trabalhe Conosco</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                    <div class="header-social-icon d-inline-block">
                        <a href="https://www.facebook.com/CassulDistribuidora" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/cassuldistribuidora/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="big-section cover-background" style="background-image:url('{{asset('images/banner/banner-tc.webp')}}');">
        <div class="opacity-extra-medium-2 bg-dark-slate-blue"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-8 col-md-10 position-relative text-center overlap-gap-section d-flex flex-column">
                    <h4 class="alt-font text-white font-weight-600 md-margin-35px-bottom xs-margin-25px-bottom wow animate__fadeIn"
                        style="visibility: visible; animation-name: fadeIn;">
                        Venha fazer parte do nosso time!
                    </h4>
                    <span class="text-white alt-font text-uppercase letter-spacing-1px wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    Construa sua carreira na Cassul Distribuidora!
                </span>
                    <a href="#vagas" title="Conheça nossas vagas">
                    <span class="btn btn-medium btn-rounded btn-new-orange btn-hvr-white margin-20px-top wow animate__fadeIn"
                          style="visibility: visible; animation-name: fadeIn;">
                        Conheça nossas vagas <i class="fas fa-arrow-right icon-very-small"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="border-top border-color-medium-gray bg-gradient-white-light-gray">
        <div class="container">
            <div class="row margin-3-rem-bottom xs-margin-4-rem-bottom align-items-center">
                <div class="col-12 col-lg-12 col-md-12 text-center text-md-start sm-margin-10px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <h5 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-1px text-uppercase margin-5px-bottom">
                        Por que trabalhar na Cassul Distribuidora?
                    </h5>
                    <p class="m-0 d-block">
                        Conheça os benefícios de fazer parte do nosso time!
                    </p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 row-cols-sm-2">
                <div class="col margin-60px-bottom sm-margin-30px-bottom xs-margin-40px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Navigation-LeftWindow icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                            Compromisso com o sucesso dos clientes
                        </span>
                            <p class="w-80">
                                Buscamos sempre a excelência no atendimento e na prestação de serviços, com foco no sucesso dos nossos clientes.
                            </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
                <div class="col margin-60px-bottom sm-margin-30px-bottom xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Cursor-Click2 icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                            Ambiente de trabalho
                        </span>
                            <p class="w-80">
                                Ambiente de trabalho agradável, com foco no desenvolvimento profissional e pessoal dos colaboradores.
                            </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
                <div class="col margin-60px-bottom sm-margin-30px-bottom xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Like-2 icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">
                            Crescimento profissional
                        </span>
                            <p class="w-80">
                                Oportunidade de crescimento profissional, com plano de carreira e treinamentos constantes.
                            </p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
                <div class="col sm-margin-30px-bottom xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Talk-Man icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Customer satisfaction</span>
                            <p class="w-80">Lorem ipsum is simply dummy text of the printing typesetting ipsum been text.</p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
                <div class="col xs-margin-40px-bottom wow animate__fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Heart icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Huge icon collection</span>
                            <p class="w-80">Lorem ipsum is simply dummy text of the printing typesetting ipsum been text.</p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
                <div class="col wow animate__fadeIn" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeIn;">
                    <!-- start feature box item -->
                    <div class="feature-box feature-box-left-icon">
                        <div class="feature-box-icon">
                            <i class="line-icon-Gear-2 icon-medium text-fast-orange margin-35px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                            <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray">Powerfull customize</span>
                            <p class="w-80">Lorem ipsum is simply dummy text of the printing typesetting ipsum been text.</p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                </div>
            </div>
        </div>
    </section>

    <section class="wow animate__fadeInLeft" data-wow-delay="0.7s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="panel-group accordion-style-01 no-margin-bottom" id="accordion-style-01">
                        <div class="panel bg-transparent">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-style-01" href="#accordion-style-1-1" aria-expanded="true">
                                    <div class="panel-title">
                                    <span class="text-extra-dark-gray font-weight-500 d-inline-block">
                                        O que a Cassul faz?
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-1-1" class="panel-collapse collapse show" data-bs-parent="#accordion-style-01" style="">
                                <div class="panel-body">
                                    <div class="border-left border-width-2px border-color-orange padding-40px-left">
                                        Há mais de quatro décadas, a Cassul Distribuidora tem desempenhado um papel fundamental no mercado de distribuição e varejo no Brasil.
                                        Fundada em 1983, a empresa se estabeleceu como uma referência em qualidade, excelência no atendimento e diversidade de produtos.
                                        <p class="margin-25px-top">
                                            Desde o início, a Cassul se comprometeu em atender às crescentes demandas de seus clientes,
                                            oferecendo uma ampla gama de produtos de alta qualidade em diversos setores. O compromisso com a inovação, a
                                            ética e a satisfação do cliente permitiu que a Cassul construísse relações sólidas e duradouras com parceiros em todo o país.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-md-6">
                    <div class="panel-group accordion-style-01 no-margin-bottom" id="accordion-style-01">
                        <div class="panel bg-transparent">
                            <div class="panel-heading">
                                <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-style-01" href="#accordion-style-1-2" aria-expanded="false">
                                    <div class="panel-title">
                                    <span class="text-extra-dark-gray font-weight-500 d-inline-block">
                                        Como reconhecemos nossos colaboradores?
                                    </span>
                                    </div>
                                </a>
                            </div>
                            <div id="accordion-style-1-2" class="panel-collapse collapse show" data-bs-parent="#accordion-style-01" style="">
                                <div class="panel-body">
                                    <div class="border-left border-width-2px border-color-orange padding-40px-left">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray" id="vagas">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 text-center margin-3-half-rem-bottom sm-margin-2-rem-bottom">
                <span class="alt-font font-weight-500 text-fast-orange d-block margin-5px-bottom text-uppercase">
                    Vagas Disponíveis
                </span>
                    <h6 class="alt-font font-weight-600 text-extra-dark-gray text-uppercase">
                        Encontre a vaga ideal para você e venha fazer parte do nosso time!
                    </h6>
                </div>
            </div>

            @if($sectors->count() > 0)
                <div class="row">
                    <div class="col-12 blog-content px-sm-0">
                        <ul class="blog-grid blog-wrapper grid grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large" style="position: relative; height: 1209.91px;">
                            <li class="grid-sizer"></li>
                            <!-- start post item -->
                            @foreach($sectors as $sector)
                            <li class="grid-item wow animate__fadeIn" style="visibility: visible; position: absolute; left: 0; top: 0; animation-name: fadeIn;">
                                <div class="blog-post border-radius-5px">
                                    <div class="blog-post-image bg-medium-slate-blue">
                                        <img class="img-vagas"
                                             src="data:image/jpeg;base64,{{$sector['avatar']}}"
                                             alt="{{$sector['name']}}" data-no-retina="data:image/jpeg;base64,{{$sector['avatar']}}">
                                    </div>

                                    <div class="post-details">
                                    <span class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray margin-15px-bottom d-block">
                                        {{$sector['name']}}
                                    </span>
                                        <p>
                                            {{$sector['description']}}
                                        </p>
                                        <div class="align-items-center">
                                        <span class="alt-font text-small">
                                            Vagas:
                                        </span>
                                            <div class="d-flex flex-column">
                                                @if(count($sector['jobs']) > 0)
                                                    @foreach($sector['jobs'] as $job)
                                                        <a href="{{route('descricao-vaga', $job['id'])}}" title="{{$job['name']}}"
                                                           class="text-fast-orange alt-font text-extra-dark-gray margin-15px-left d-inline-block">
                                                            {{$job['name']}}
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <span class="text-black alt-font text-extra-dark-gray margin-15px-left d-inline-block">
                                                        Não há vagas disponíveis
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
            @endif
        </div>
    </section>

    <section class="padding-100px-tb md-padding-75px-tb sm-padding-50px-tb wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-xl-3 col-lg-4 col-md-5 col-sm-6 text-center text-sm-end xs-margin-20px-bottom">
                <span class="alt-font font-weight-500 text-extra-large text-extra-dark-gray d-block letter-spacing-minus-1-half">
                    Siga nossas redes sociais
                </span>
                </div>
                <div class="col-12 col-md-2 d-none d-md-block">
                    <span class="w-100 h-1px d-block bg-medium-gray"></span>
                </div>
                <div class="col-12 col-xl-3 col-lg-4 col-md-5 col-sm-6 social-icon-style-02 text-center text-sm-start">
                    <ul class="small-icon">
                        <li><a class="facebook text-extra-dark-gray text-sm-start" href="https://www.facebook.com/CassulDistribuidora" target="_blank">
                                <i class="fab fa-facebook-f"></i></a></li>
                        <li><a class="youtube text-extra-dark-gray text-sm-start" href="https://www.youtube.com/channel/UCSGOfdR-yajwxp3N0f6sHsQ" target="_blank">
                                <i class="fab fa-youtube"></i></a></li>
                        <li><a class="instagram text-extra-dark-gray text-sm-start" href="https://www.instagram.com/cassuldistribuidora/" target="_blank">
                                <i class="fab fa-instagram"></i></a></li>
                        <li><a class="linkedin text-extra-dark-gray text-sm-start" href="https://pt.linkedin.com/company/cassul" target="_blank">
                                <i class="fab fa-linkedin-in"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.footer')
@endsection

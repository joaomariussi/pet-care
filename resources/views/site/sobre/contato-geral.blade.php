@extends('site.includes.base-layout')

@section('title', 'Contato Geral')

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
                                <a href="{{route('contato-geral')}}" title="Contato Cassul Distribuidora" class="nav-link active">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trabalhe-conosco')}}" title="Trabalha Conosco" class="nav-link">Trabalhe Conosco</a>
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

    <section class="parallax" data-parallax-background-ratio="0.5" style="background-image:url('https://via.placeholder.com/1920x1100');">
        <div class="opacity-medium bg-transparent-gradient-gray-orange"></div>
        <div class="container">
            <div class="row align-items-stretch justify-content-center extra-small-screen">
                <div class="col-12 position-relative page-title-large text-center d-flex align-items-center justify-content-center flex-column">
                <span class="d-block text-white opacity-6 alt-font margin-5px-bottom xs-line-height-20px">
                    Fale Conosco
                </span>
                    <h1 class="alt-font text-white font-weight-500 no-margin-bottom">
                        Olá, como podemos ajudar?
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2">
                <!-- start feature box item -->
                <div class="col md-margin-50px-bottom sm-margin-30px-bottom">
                    <div class="feature-box text-center">
                        <div class="feature-box-icon">
                            <i class="line-icon-Geo2-Love icon-extra-medium text-fast-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">
                            Onde estamos
                        </span>
                            <p class="d-inline-block w-70 lg-w-90 md-w-60 sm-w-80 xs-w-100">
                                BR-153, nº 700 - KM53 - FRINAPE, Erechim - RS, 99709-780
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col md-margin-50px-bottom sm-margin-30px-bottom">
                    <div class="feature-box text-center">
                        <div class="feature-box-icon">
                            <i class="line-icon-Headset icon-extra-medium text-fast-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">
                            Ligue para nós
                        </span>
                            <p>Telefone: (54) 3520-1500
                                <br>Televendas: 0800 510 7781
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col xs-margin-30px-bottom">
                    <div class="feature-box text-center">
                        <div class="feature-box-icon">
                            <i class="line-icon-Mail-Read icon-extra-medium text-fast-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">
                            Envie um e-mail
                        </span>
                            <p><a href="mailto:info@yourdomain.com" class="text-sky-blue-hover">
                                    info@yourdomain.com
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col">
                    <div class="feature-box text-center">
                        <div class="feature-box-icon">
                            <i class="line-icon-Information icon-extra-medium text-fast-orange margin-30px-bottom md-margin-15px-bottom sm-margin-10px-bottom"></i>
                        </div>
                        <div class="feature-box-content last-paragraph-no-margin">
                        <span class="alt-font font-weight-500 margin-10px-bottom d-block text-extra-dark-gray text-small text-uppercase">
                            Informações
                        </span>
                            <p class="d-inline-block w-70 lg-w-90 md-w-60 sm-w-80 xs-w-100">
                                Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>

    <section class="wow animate__fadeIn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-12 col-xl-6 col-lg-7 text-center margin-4-half-rem-bottom md-margin-3-rem-bottom">
                        <span class="alt-font letter-spacing-minus-1-half text-extra-medium d-block margin-5px-bottom">
                            Preencha o formulário e entraremos em contato em breve!
                        </span>
                            <h4 class="alt-font font-weight-600 text-extra-dark-gray">
                                Qual seria sua dúvida?
                            </h4>
                        </div>
                        <div class="col-12">
                            <!-- start contact form -->
                            <form action="{{route('enviar-contato')}}" method="POST" id="form_contact" enctype="multipart/form-data">
                                @csrf
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col margin-1-rem-bottom sm-margin-25px-bottom">
                                        <select name="sector_id" id="sector_id" class="form-control medium-input margin-25px-bottom bg-white">
                                            <option value="" selected disabled>Escolha um setor</option>
                                            @foreach($sectors as $sector)
                                                <option value="{{$sector->id}}">{{$sector['name']}}</option>
                                            @endforeach
                                        </select>
                                        <input class="form-control medium-input bg-white margin-25px-bottom required"
                                               type="text"
                                               name="name"
                                               required
                                               value="{{old('name')}}"
                                               placeholder="Nome Completo">
                                        <input class="form-control medium-input bg-white margin-25px-bottom required"
                                               type="email"
                                               name="email"
                                               value="{{old('email')}}"
                                               required
                                               placeholder="E-mail">
                                        <div class="input-group">
                                            <span class="input-group-text" style="max-height: 53px;">
                                                <span id="selected-country-flag" class="flag-icon flag-icon-br"></span>
                                                <span id="selected-country-code">+55</span>
                                            </span>
                                            <input class="form-control medium-input bg-white margin-25px-bottom phone"
                                                   type="tel"
                                                   name="phone_number"
                                                   value="{{old('phone_number')}}"
                                                   required
                                                   placeholder="Telefone">
                                        </div>
                                        <input class="form-control medium-input bg-white margin-25px-bottom"
                                               name="city_name"
                                               value="{{old('city_name')}}"
                                               required
                                               placeholder="Cidade">
                                        <select class="form-control medium-input bg-white mb-0 required"
                                                value="{{old('state_uf')}}"
                                                name="state_uf" required>
                                            <option value="" disabled selected>Selecione o Estado</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                    <div class="col margin-1-rem-bottom sm-margin-10px-bottom">
                                        <input class="form-control medium-input bg-white margin-25px-bottom"
                                               type="text"
                                               name="subject"
                                               value="{{old('subject')}}"
                                               placeholder="Assunto">
                                        <textarea class="form-control medium-textarea h-200px bg-white" name="message" value="{{old('message')}}" required placeholder="Mensagem">
                                        </textarea>

                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                        <div id="recaptchaError" class="text-danger"></div>

                                        <div class="col mt-3">
                                            <button class="btn btn-medium btn-new-orange text-white btn-hvr-white mb-0" onclick="verifyRecaptcha()" type="submit">
                                                Enviar Mensagem
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                            <!-- end contact form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray padding-100px-tb md-padding-75px-tb sm-padding-50px-tb wow animate__fadeIn">
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

    <section class="p-0 wow animate__fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col h-600px p-0 md-h-450px xs-h-300px">
                    <iframe class="w-100 h-100 " src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.214706465866!2d-52.2887649!3d-27.6770076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e31450f48bca91%3A0x78276bf6d5c94f17!2sCassul%20Distribuidora!5e0!3m2!1spt-BR!2sbr!4v1697222095508!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.footer')
@endsection

@section('page-scripts')
    <script>
        function verifyRecaptcha() {
            let recaptchaToken = grecaptcha.getResponse();

            if (!recaptchaToken) {
                document.getElementById('recaptchaError').innerText = 'Por favor, preencha o reCAPTCHA.';
                return false;
            }

            document.getElementById('recaptchaError').innerText = '';
            document.getElementById('form_contact').submit();
        }
    </script>

    <script>
        function updateCountryCode() {
            let countrySelect = document.getElementById("country-select");
            let selectedCountry = countrySelect.value;
            let selectedOption = countrySelect.options[countrySelect.selectedIndex];
            let countryCode = selectedOption.getAttribute("data-country-code");
            let countryFlag = selectedOption.value;

            document.getElementById("selected-country-flag").className = "flag-icon flag-icon-" + countryFlag;
            document.getElementById("selected-country-code").textContent = "+" + countryCode;
        }
    </script>

    <script src="{{asset('js/core/libraries/jquery-mask-plugin/jquery-mask.js')}}"></script>
    <script src="{{asset('js/scripts/extensions/masks.js')}}"></script>
@endsection

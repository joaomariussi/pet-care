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
                                <a href="{{route('trabalhe-conosco')}}" title="Trabalha Conosco" class="nav-link active">Trabalhe Conosco</a>
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

    <section class="big-section cover-background" style="background-image:url('{{asset('images/banner/banner-tc.webp')}}');">
        <div class="opacity-extra-medium-2 bg-dark-slate-blue"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-7 col-lg-8 col-md-10 position-relative text-center overlap-gap-section d-flex flex-column">
                    <h4 class="alt-font text-white font-weight-600 md-margin-35px-bottom xs-margin-25px-bottom wow animate__fadeIn"
                        style="visibility: visible; animation-name: fadeIn;">
                        {{$job['name']}}
                    </h4>
                    <span class="text-white alt-font text-uppercase letter-spacing-1px wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    Mais informações sobre a vaga!
                </span>
                    <a href="#inscreva" title="Conheça nossas vagas">
                    <span class="btn btn-medium btn-rounded btn-new-orange btn-hvr-white margin-20px-top wow animate__fadeIn"
                          style="visibility: visible; animation-name: fadeIn;">
                        Inscreva-se <i class="fas fa-arrow-down icon-very-small"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray min-section wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-12">
                    {!! $job['description'] !!}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-gray min-section wow animate__fadeIn" id="inscreva">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <form action="{{route('enviar-curriculo', $job['id'])}}" id="form-jobs"
                                  method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col margin-4-rem-bottom sm-margin-25px-bottom">
                                        <input type="text" class="form-control medium-input margin-25px-bottom required"
                                               readonly disabled
                                               value="{{$job['name']}}">
                                        <input class="form-control medium-input bg-white margin-25px-bottom required"
                                               type="text"
                                               name="name"
                                               value="{{old('name')}}"
                                               required
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
                                            <input class="medium-input bg-white margin-25px-bottom required phone form-control"
                                                   type="tel"
                                                   name="phone"
                                                   required
                                                   value="{{old('phone')}}"
                                                   placeholder="Contato">
                                        </div>
                                        <input class="form-control medium-input bg-white margin-25px-bottom required"
                                               type="date"
                                               name="birth_date"
                                               required
                                               value="{{old('birth_date')}}"
                                               placeholder="Sua Data de Nascimento">
                                        <input class="form-control medium-input bg-white margin-25px-bottom required"
                                               name="city"
                                               required
                                               value="{{old('city')}}"
                                               placeholder="Cidade">
                                        <select class="form-control medium-input bg-white mb-0 required" name="state" required>
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
                                    <div class="col margin-4-rem-bottom sm-margin-10px-bottom">
                                        <h6 class="justify-content-center d-flex">
                                            Anexar Currículo
                                        </h6>
                                        <input type="file" name="file_pdf" value="{{old('file_pdf')}}" accept="application/pdf"
                                               required class="form-control medium-input bg-white margin-25px-bottom">

                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                        <div id="recaptchaError" class="text-danger"></div>

                                        <div class="col-12 mt-3">
                                            <button class="btn btn-medium btn-new-orange text-white btn-hvr-white mb-0" onclick="verifyRecaptcha()" type="submit">
                                                Candidatar-se
                                            </button>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger mt-3">
                                                <i class="fa-solid fa-triangle-exclamation"></i>
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wow animate__fadeIn">
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

@section('page-scripts')
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('html, body').animate({
                    scrollTop: $('#inscreva').offset().top
                }, 'slow');
            });
        </script>
    @endif

    <script>
        function verifyRecaptcha() {
            let recaptchaToken = grecaptcha.getResponse();

            if (!recaptchaToken) {
                document.getElementById('recaptchaError').innerText = 'Por favor, preencha o reCAPTCHA.';
                return false;
            }

            document.getElementById('recaptchaError').innerText = '';
            document.getElementById('form-jobs').submit();
        }
    </script>

    <script src="{{asset('js/core/libraries/jquery-mask-plugin/jquery-mask.js')}}"></script>
    <script src="{{asset('js/scripts/extensions/masks.js')}}"></script>

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
@endsection

@extends('admin.layouts.menusLayout')

@section('title', 'Home Page')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/home/home-index.css') }}">
@endsection

@section('content')
    <section class="index-home">
        <section id="breadcrumb-divider">
            <div class="row">
                <div class="card-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-cadastros">
                            <li class="breadcrumb-item"><a href="/"><i
                                        class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item">Gerenciamento</li>
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Configurações</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12 col-xl-12">
                <div class="card-content">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('jobs')}}"
                               aria-controls="contacts"
                               aria-selected="true">
                                <i class="fa-solid fa-gear"></i>
                                <span class="align-middle">Configurações</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <b class="title-geral-etapas-sub">
                Home Page
            </b>
            <p>
                Defina as configurações da Home Page do seu site.
            </p>

            <form method="POST" action="{{route($homeConfig ? 'home.update' : 'home.view-create')}}" enctype="multipart/form-data">
                @csrf
                <div class="accordion">
                    <div class="accordion-item">
                        <button class="accordion-button {{form_collapse_errors($errors, ['home_title', 'home_subtitle', 'avatar'])}}" type="button" data-bs-toggle="collapse"
                                data-bs-target="#informacoesGerais-collapse" aria-expanded="true"
                                aria-controls="informacoesGerais-collapse">
                            <i class="fa-solid fa-info-circle font-medium-5"></i>
                            <span class="ms-2">Informações Gerais</span>
                        </button>
                        <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                             aria-labelledby="informacoesGerais-headingOne" data-bs-parent="#informacoesGerais">
                            <div class="accordion-body">
                                <fieldset>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-12 col-xl-12">
                                            <div class="form-group">
                                                <label for="home_title">Título</label>
                                                <input type="text" class="form-control" id="home_title"
                                                       name="home_title" value="{{old('home_title', $homeConfig['home_title'] ?? '')}}"
                                                       required>
                                            </div>
                                            @error('home_title')
                                                {{form_collapse_errors_message('home_title', $message)}}
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-xl-12">
                                            <div class="form-group">
                                                <label for="home_subtitle">Subtítulo</label>
                                                <input type="text" class="form-control" id="home_subtitle"
                                                       name="home_subtitle" value="{{old('home_subtitle', $homeConfig['home_subtitle'] ?? '')}}"
                                                       required>
                                            </div>
                                            @error('home_subtitle')
                                                {{form_collapse_errors_message('home_subtitle', $message)}}
                                            @enderror
                                        </div>

                                        <div class="col-12 col-md-12 col-xl-12">
                                            <div class="form-group">
                                                <label hidden class="" for="background_img">Imagem de Fundo</label>
                                                <div class="max-width">
                                                    <div class="imgContainer">
                                                        @isset($homeConfig['avatar'])
                                                            <img src="data:image/png;base64,{{$homeConfig['avatar']}}"
                                                                 alt="{{$homeConfig['home_title']}}" id="imgPhoto">
                                                        @else
                                                            <img src="{{asset('images/background/camera.png')}}" alt="Selecione uma imagem" id="imgPhoto">
                                                        @endif
                                                    </div>
                                                </div>
                                                <input type="file" id="avatar" name="avatar"
                                                       value="{{old('avatar', $homeConfig['avatar'] ?? '')}}"
                                                       accept="image/*">

                                                <small class="label-img">
                                                    FUNDO DA HOME PAGE
                                                </small>

                                                <small class="type_permited">
                                                    Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                    <br>
                                                    Tamanho: 1920x1080px
                                                </small>
                                            </div>
                                            @error('avatar')
                                                {{form_collapse_errors_message('avatar', $message)}}
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn button_save_forms">
                        <i class="fa-solid fa-save"></i> Salvar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>
@endsection

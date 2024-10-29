@extends('admin.layouts.menusLayout')

@section('title', 'Editar Usuário')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/user/create.css') }}">
@endsection

@section('content')
    <section class="update-user">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Administração</li>
                                    <li class="breadcrumb-item"><a href="{{route('user')}}">Usuários</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('user')}}">Lista</a></li>
                                    <li class="breadcrumb-item active">Editar Usuário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Usuário: {{$user['name']}}</b>
                <p>Preencha os formulários abaixo para editar o usuário desejado.</p>

                <form method="POST" action="{{route('user.update', $user['id'])}}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-4 col-xl-4">

                            <div class="accordion">
                                <div class="accordion-item">
                                    <button
                                        class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['avatar'])}}"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#avatar-collapse"
                                        aria-expanded="true" aria-controls="avatar-collapse">
                                        <i class="fa-solid fa-image font-medium-5"></i>
                                        <span class="ms-2">Avatar</span>
                                    </button>

                                    <div id="avatar-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="avatar-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label hidden class="mb-3" for="avatar">Avatar</label>
                                                            <div class="max-width">
                                                                <div class="imageContainer">
                                                                    @isset($user['avatar'])
                                                                        <img src="data:image/jpeg;base64,{{$user['avatar']}}" alt="Logo Usuário" id="imgPhoto">
                                                                    @else
                                                                        <img src="{{asset('images/camera.png')}}"
                                                                             alt="Selecione uma imagem" id="imgPhoto">
                                                                    @endisset
                                                                </div>
                                                            </div>
                                                            <input type="file" id="avatar"
                                                                   class="@error('avatar') is-invalid @enderror"
                                                                   name="avatar"
                                                                   accept="image/*">

                                                            <small class="type_permited">
                                                                Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                            </small>
                                                            @error('avatar')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-8 col-xl-8">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button
                                        class="accordion-button erroInfoGerais
                                        {{form_collapse_errors($errors, ['name','email'])}}"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#informacoesGerais-collapse"
                                        aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span><small
                                            class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control @error('name')
                                                             is-invalid @enderror" id="name"
                                                                   name="nome" placeholder="Nome"
                                                                   value="{{old('nome')?:$user['name']}}">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="email">E-mail</label>
                                                            <input type="email" class="form-control
                                                             @error('email') is-invalid @enderror" id="email"
                                                                   name="email" placeholder="E-mail"
                                                                   value="{{old('email')?:$user['email']}}">
                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Star Buttons form -->
                    <div class="btnsSave mt-3 d-flex justify-content-end float-end">
                        <button type="submit" class="btn button_save_forms saveForm"><i
                                class="fa-solid fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                    <!-- End Buttons form -->
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>
@endsection

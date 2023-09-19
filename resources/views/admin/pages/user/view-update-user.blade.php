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
                                        class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','email','password'])}}"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#avatar-collapse"
                                        aria-expanded="true" aria-controls="avatar-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
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
                                                                        <img src="{{asset('images/background/camera.png')}}"
                                                                             alt="Selecione uma imagem" id="imgPhoto">
                                                                    @endisset
                                                                </div>
                                                            </div>
                                                            <input type="file" id="avatar" name="avatar"
                                                                   accept="image/*">

                                                            <small class="type_permited">
                                                                Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                            </small>
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
                                        class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','email','type'])}}"
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
                                                            <input type="text" class="form-control" id="name"
                                                                   name="name" placeholder="Nome"
                                                                   value="{{old('name')?:$user['name']}}">
                                                            @error('name')
                                                            {!! form_collapse_errors_message('name', strtoupper($message)) !!}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="email">E-mail</label>
                                                            <input type="email" class="form-control" id="email"
                                                                   name="email" placeholder="E-mail"
                                                                   value="{{old('email')?:$user['email']}}">
                                                            @error('email')
                                                            {!! form_collapse_errors_message('email', strtoupper($message)) !!}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @can('admin')
                                                        @if($user['type'] != 'webmaster' && $user['type'] != 'admin')
                                                            <div class="col-12 col-md-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label for="type">Tipo de Usuário</label>
                                                                    <select class="form-select" id="type" name="type" readonly="true">
                                                                        <option value="" disabled selected>Selecione o
                                                                            tipo
                                                                        </option>
                                                                        <option
                                                                            value="admin" {{old('type') == 'admin' || $user['type'] == 'admin' ? 'selected' : ''}}>
                                                                            admin
                                                                        </option>
                                                                        <option
                                                                            value="user" {{old('type') == 'user' || $user['type'] == 'user' ? 'selected' : ''}}>
                                                                            user
                                                                        </option>
                                                                    </select>
                                                                    @error('type')
                                                                    {!! form_collapse_errors_message('type', strtoupper($message)) !!}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-12 col-md-4 col-xl-4">
                                                                <div class="form-group">
                                                                    <label for="type">Tipo de Usuário</label>
                                                                    <input type="text" class="form-control" id="type"
                                                                           name="type" placeholder="Tipo de Usuário"
                                                                           value="{{old('type')?:$user['type']}}"
                                                                           readonly>
                                                                    @error('type')
                                                                    {!! form_collapse_errors_message('type', strtoupper($message)) !!}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endcan
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Star Buttons form -->
                    <div class="btnsSave mt-3 justify-content-between d-flex float-end">
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

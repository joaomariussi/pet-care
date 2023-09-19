@extends('admin.layouts.menusLayout')

@section('title', 'Meu Perfil')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset(mix('css/admin/pages/user/create.css')) }}">
@endsection

@section('content')
    <section class="details-profile">
        <div class="row">
            <div class="col-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Administração</li>
                                    <li class="breadcrumb-item active">Meu Perfil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Informações do Usuário</b>
                <p>Visualize e altere as informações do seu perfil.</p>

                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                @empty($user['avatar'])
                                    <div class="d-flex mb-3 gap-2 justify-content-center">
                                        <img class="img-fluid" width="180" height="180" alt="Avatar do Usuário"
                                             src="{{asset('images/logo/avatar.webp')}}">
                                    </div>
                                @else
                                    <div class="d-flex mb-3 gap-2 justify-content-center">
                                        <img class="img-fluid" width="180" height="180" alt="Avatar do Usuário"
                                             src="data:image/jpeg;base64,{{$user['avatar']}}">
                                    </div>
                                @endempty

                                <small class="text-muted text-uppercase">Detalhes do Usuário</small>

                                <div class="info-container">
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="mb-3">
                                            <i class="fa-solid fa-user"></i>
                                            <span class="fw-bold">Nome do Usuário:</span>
                                            <span class="w-100 d-block">{{$user['name']}}</span>
                                        </li>

                                        <li class="mb-3">
                                            <i class="fa-solid fa-envelope"></i>
                                            <span class="fw-bold">E-mail:</span>
                                            <span class="w-100 d-block">{{$user['email']}}</span>
                                        </li>

                                        <li class="mb-3">
                                            <i class="fa-solid fa-paperclip"></i>
                                            <span class="fw-bold">Tipo de Usuário:</span>
                                            <span class="w-100 d-block">{{$user['type']}}</span>
                                        </li>

                                        <li class="mb-3">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span class="fw-bold">Data de Cadastro:</span>
                                            <span class="w-100 d-block">{{\Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i:s')}}</span>
                                        </li>

                                        <li class="mb-3">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span class="fw-bold">Data de Atualização:</span>
                                            <span class="w-100 d-block">{{\Carbon\Carbon::parse($user['updated_at'])->format('d/m/Y H:i:s')}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-xl-8">
                        <div class="accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="brandsAndCategories">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#brandsAndCategories-collapseOne" aria-expanded="true"
                                            aria-controls="brandsAndCategories-collapseOne">
                                        <i class="fa-solid fa-edit font-medium-5"></i>
                                        <span class="ms-2">Editar Usuário</span>
                                    </button>
                                </h2>
                                <div id="brandsAndCategories-collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="brandsAndCategories">
                                    <div class="accordion-body">
                                        <form method="POST" action="{{route('user.update-profile', $user['id'])}}"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="row g-3">
                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="name" class="form-label">Nome</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               value="{{$user['name']}}" required>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="email" class="form-label">E-mail</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                               value="{{$user['email']}}" required>
                                                    </div>
                                                </div>

                                                @can('admin')
                                                    @if($user['type'] != 'webmaster')
                                                        <div class="col-12 col-md-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="type" class="form-label">Tipo de Usuário</label>
                                                                <select class="form-select" id="type" name="type" required>
                                                                    <option value="" disabled selected>Selecione o tipo</option>
                                                                    <option value="admin" <?= $user['type'] == 'admin' ? 'selected' : '' ?>>admin</option>
                                                                    <option value="user" <?= $user['type'] == 'user' ? 'selected' : '' ?>>user</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12 col-md-4 col-xl-4">
                                                            <div class="form-group">
                                                                <label for="type" class="form-label">Tipo de Usuário</label>
                                                                <select class="form-select" id="type" name="type" required disabled>
                                                                    <option value="" disabled selected>Selecione o tipo</option>
                                                                    <option value="webmaster" <?= $user['type'] == 'webmaster' ? 'selected' : '' ?>>webmaster</option>
                                                                    <option value="admin" <?= $user['type'] == 'admin' ? 'selected' : '' ?>>admin</option>
                                                                    <option value="user" <?= $user['type'] == 'user' ? 'selected' : '' ?>>user</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif


                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn button_save_forms">
                                                        <i class="fa-solid fa-save"></i> Salvar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mt-3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="avatar-collapse">
                                    <button class="accordion-button collapsed {{form_collapse_errors($errors, ['avatar'])}}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#avatar-collapseOne" aria-expanded="true"
                                            aria-controls="avatar-collapseOne">
                                        <i class="fa-solid fa-image font-medium-5"></i>
                                        <span class="ms-2">Alterar Avatar</span>
                                    </button>
                                </h2>
                                <div id="avatar-collapseOne" class="accordion-collapse collapse"
                                     aria-labelledby="avatar-collapse">
                                    <div class="accordion-body">
                                        <fieldset>
                                            <form method="POST" action="{{route('user.update-avatar', $user['id'])}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label hidden class="mb-3" for="avatar">Avatar</label>
                                                            <div class="max-width" style="max-width: 100%;">
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
                                                            @error('avatar')
                                                            {!! form_collapse_errors_message('avatar', strtoupper($message)) !!}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn button_save_forms">
                                                            <i class="fa-solid fa-save"></i> Salvar
                                                        </button>
                                                    </div>

                                                </div>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mt-3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="password">
                                    <button class="accordion-button collapsed {{form_collapse_errors($errors, ['current_password', 'new_password', 'confirm_new_password'])}}" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#password-collapseOne" aria-expanded="true"
                                            aria-controls="password-collapseOne">
                                        <i class="fa-solid fa-lock font-medium-5"></i>
                                        <span class="ms-2">Alterar Senha</span>
                                    </button>
                                </h2>
                                <div id="password-collapseOne" class="accordion-collapse collapse"
                                     aria-labelledby="password">
                                    <div class="accordion-body">
                                        <form method="POST" action="{{route('user.update-password', $user['id'])}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="current_password" class="form-label">Senha Atual</label>
                                                        <input type="password" class="form-control" id="current_password" name="current_password">
                                                    </div>
                                                    @error('current_password')
                                                    {!! form_collapse_errors_message('current_password', strtoupper($message)) !!}
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="new_password" class="form-label">Nova Senha</label>
                                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                                    </div>
                                                    @error('new_password')
                                                    {!! form_collapse_errors_message('new_password', strtoupper($message)) !!}
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="confirm_new_password" class="form-label">Confirmar Nova Senha</label>
                                                        <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                                                    </div>
                                                    @error('confirm_new_password')
                                                    {!! form_collapse_errors_message('confirm_new_password', strtoupper($message)) !!}
                                                    @enderror
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn button_save_forms">
                                                        <i class="fa-solid fa-save"></i> Salvar
                                                    </button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('page-scripts')
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>
@endsection

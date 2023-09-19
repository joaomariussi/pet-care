@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Usuários')

@section('page-styles')

@endsection

@section('content')
    <section class="insert-user">
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
                                    <li class="breadcrumb-item active">Novo Usuário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Usuários</b>
                <p>Preencha o formulário abaixo para cadastrar um novo usuário</p>

                <form method="POST" action="{{route('user.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="accordion">
                            <div class="accordion-item">
                                <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','email','password'])}}" type="button" data-bs-toggle="collapse" data-bs-target="#informacoesGerais-collapse"
                                        aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                    <i class="fa-solid fa-circle-info font-medium-5"></i>
                                    <span class="ms-2">Informações Gerais</span><small class="ms-1">(Obrigatório)</small>
                                </button>

                                <div id="informacoesGerais-collapse" class="accordion-collapse collapse show" aria-labelledby="informacoesGerais-headingOne">
                                    <div class="accordion-body">
                                        <fieldset>
                                            <div class="row g-3">
                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="name">Nome</label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
                                                        @error('name')
                                                            {!! form_collapse_errors_message('name', strtoupper($message)) !!}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
                                                        @error('email')
                                                            {!! form_collapse_errors_message('email', strtoupper($message)) !!}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="password">Senha</label>
                                                        <input type="password" class="form-control"
                                                               id="password"
                                                               name="password"
                                                               placeholder="Senha" value="{{old('password')}}">
                                                        @error('password')
                                                            {!! form_collapse_errors_message('password', strtoupper($message)) !!}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label for="type">Tipo de Usuário</label>
                                                        <select class="form-select" id="type" name="type">
                                                            <option value="admin" {{old('type') == 'admin' ? 'selected' : ''}}>admin</option>
                                                            <option value="user" {{old('type') == 'user' ? 'selected' : ''}}>user</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Star Buttons form -->
                    <div class="btnsSave mt-3 justify-content-between d-flex float-end">
                        <button type="submit" class="btn button_save_forms saveForm"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                    </div>
                    <!-- End Buttons form -->
                </form>
            </div>
        </div>
    </section>
@endsection

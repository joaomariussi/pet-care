@extends('admin.layouts.menusLayout')

@section('title', 'Editar Veterinário')')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/veterinarians/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css')}}">
@endsection

@section('content')
    <section class="insert-positions">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('veterinarians')}}">Veterinários</a></li>
                                    <li class="breadcrumb-item active">Editar Veterinário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Editar Veterinário - {{$veterinarian->name}}</b>
                <p class="sub-title-geral-etapas">Edite as informações do veterinário</p>

                <form method="POST" action="{{route('veterinarians.update', $veterinarian->id)}}"
                      class="form form-insert-veterinarians">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['name','cpf', 'email','cell_phone', 'crm'])}}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações do Cadastro</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome*</label>
                                                            <input type="text" class="form-control @error('name')
                                                            is-invalid @enderror" id="name" name="name"
                                                                   placeholder="Nome do Veterinário"
                                                                   value="{{old('name') ?? $veterinarian->name}}">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="cpf">CPF*</label>
                                                            <input type="text" class="form-control @error('cpf')
                                                            is-invalid @enderror" id="cpf" name="cpf"
                                                                   placeholder="CPF do Veterinário" maxlength="14"
                                                                   value="{{old('cpf') ?? $veterinarian->cpf}}">
                                                            @error('cpf')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email*</label>
                                                            <input type="email" class="form-control @error('email')
                                                            is-invalid @enderror" id="email" name="email"
                                                                   placeholder="Email do Veterinário"
                                                                   value="{{old('email') ?? $veterinarian->email}}">
                                                            @error('email')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="cell_phone">Celular</label>
                                                            <input type="text" class="form-control @error('cell_phone')
                                                            is-invalid @enderror" id="cell_phone" name="cell_phone"
                                                                   placeholder="Informe um celular válido" maxlength="15"
                                                                   value="{{old('cell_phone') ?? $veterinarian->cell_phone}}">
                                                            @error('cell_phone')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="crm">CRM</label>
                                                            <input type="text" class="form-control @error('crm')
                                                            is-invalid @enderror" id="crm" name="crm" maxlength="8"
                                                                   placeholder="Informe o CRM do Veterinário"
                                                                   value="{{old('crm') ?? $veterinarian->crm}}">
                                                            @error('crm')
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

                    <div class="btnsSave mt-3 justify-content-between d-flex float-end">
                        <button type="submit" class="btn button_save_forms saveForm">
                            <i class="fa-solid fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/veterinarians/veterinarians.js')}}"></script>
@endsection

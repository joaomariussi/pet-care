@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Funcionários')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/employees/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css') }}">
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
                                    <li class="breadcrumb-item"><a href="{{route('employees')}}">Funcionários</a></li>
                                    <li class="breadcrumb-item active">Novo Funcionário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Funcionário</b>
                <p>Preencha o formulário abaixo para cadastrar um novo funcionário.</p>

                <form method="POST" action="{{route('employees.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                            {{form_collapse_errors($errors, ['name','cpf','email', 'telephone',
                                            'admission_date', 'position_id'])}}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações do Cadastro</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome*</label>
                                                            <input type="text" class="form-control @error('name')
                                                            is-invalid @enderror" id="name" name="name"
                                                                   placeholder="Nome do Funcionário"
                                                                   value="{{old('name')}}">
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
                                                                   placeholder="CPF do Funcionário" maxlength="14"
                                                                   value="{{old('cpf')}}">
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
                                                                   placeholder="Email do Funcionário"
                                                                   value="{{old('email')}}">
                                                            @error('email')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="telephone">Telefone*</label>
                                                            <input type="text" class="form-control @error('telephone')
                                                            is-invalid @enderror" id="telephone" name="telephone"
                                                                   placeholder="Telefone do Funcionário" maxlength="15"
                                                                   value="{{old('telephone')}}">
                                                            @error('telephone')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="admission_date">Data de Admissão*</label>
                                                            <input type="date" class="form-control @error('admission_date')
                                                            is-invalid @enderror" id="admission_date" name="admission_date"
                                                                   value="{{old('admission_date')}}">
                                                            @error('admission_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="position_id">Cargo*</label>
                                                            <select class="form-control @error('position_id')
                                                            is-invalid @enderror" id="position_id" name="position_id">
                                                                <option value="">Selecione o cargo</option>
                                                                @foreach($positions as $position)
                                                                    <option value="{{$position->id}}"
                                                                        {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                                                        {{$position->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('position_id')
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
    <script src="{{asset('js/scripts/pages/employees/employees.js')}}"></script>
@endsection

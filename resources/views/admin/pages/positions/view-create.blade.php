@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Cargo')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/positions/create.css') }}">
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
                                    <li class="breadcrumb-item"><a href="{{route('positions')}}">Cargos</a></li>
                                    <li class="breadcrumb-item active">Novo Cargo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Cargos</b>
                <p>Preencha o formulário abaixo para cadastrar um novo cargo.</p>

                <form method="POST" action="{{route('positions.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['name','description', 'salary',
                                    'experience_with_animals', 'additional_skills', 'weekly_workload'])}}"
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
                                                                   placeholder="Nome do Cargo" value="{{old('name')}}">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="weekly_workload">Carga Horária Semanal*</label>
                                                            <input type="text" class="form-control @error('weekly_workload')
                                                             is-invalid @enderror" id="weekly_workload" name="weekly_workload"
                                                                   placeholder="Informe a carga horária semanal"
                                                                   value="{{old('weekly_workload')}}">
                                                            @error('weekly_workload')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="salary">Salário*</label>
                                                            <input type="text" class="form-control @error('salary')
                                                             is-invalid @enderror" id="salary" name="salary"
                                                                   placeholder="Informe o salário do cargo"
                                                                   value="{{old('salary')}}">
                                                            @error('salary')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="experience_with_animals">
                                                                Experiência com Animais*
                                                            </label>
                                                            <select class="form-control @error('experience_with_animals')
                                                            is-invalid @enderror" id="experience_with_animals"
                                                                    name="experience_with_animals">
                                                                <option value="Iniciante"
                                                                    {{ old('experience_with_animals') == 'Iniciante' ? 'selected' : '' }}>
                                                                    Iniciante
                                                                </option>
                                                                <option value="Moderado"
                                                                    {{ old('experience_with_animals') == 'Moderado' ? 'selected' : '' }}>
                                                                    Moderado
                                                                </option>
                                                                <option value="Avançado"
                                                                    {{ old('experience_with_animals') == 'Avançado' ? 'selected' : '' }}>
                                                                    Avançado
                                                                </option>
                                                                <option value="Especialista"
                                                                    {{ old('experience_with_animals') == 'Especialista' ? 'selected' : '' }}>
                                                                    Especialista
                                                                </option>
                                                            </select>
                                                            @error('experience_with_animals')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="additional_skills">Habilidades Adicionais</label>
                                                            <textarea class="form-control @error('additional_skills')
                                                             is-invalid @enderror" id="additional_skills"
                                                                      name="additional_skills"
                                                                      placeholder="Informe as habilidades adicionais"
                                                                      rows="2">{{old('additional_skills')}}
                                                            </textarea>
                                                            @error('additional_skills')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="description">Descrição</label>
                                                            <textarea class="form-control @error('description')
                                                             is-invalid @enderror" id="description" name="description"
                                                                      placeholder="Descrição do Cargo"
                                                                      rows="2">{{old('description')}}
                                                            </textarea>
                                                            @error('description')
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
    <script src="{{asset('js/scripts/pages/positions/positions.js')}}"></script>
@endsection

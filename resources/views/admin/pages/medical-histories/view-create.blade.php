@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Histórico Médico')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/medical-histories/create.css') }}">
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
                                    <li class="breadcrumb-item"><a href="{{route('medical-histories')}}">Histórico Médico</a></li>
                                    <li class="breadcrumb-item active">Novo Histórico Médico</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Histórico Médico</b>
                <p>Preencha o formulário abaixo para cadastrar um novo histórico médico.</p>

                <form method="POST" action="{{route('medical_history.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                            {{form_collapse_errors($errors, ['pet_id','veterinarian_id','diagnosis',
                                            'treatment', 'date', 'observations'])}}" type="button"
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
                                                            <label for="pet_id">Pet*</label>
                                                            <select class="form-control @error('pet_id') is-invalid
                                                            @enderror" id="pet_id" name="pet_id">
                                                                <option value="">Selecione o Pet</option>
                                                                @foreach($pets as $pet)
                                                                    <option value="{{ $pet->id }}"
                                                                            {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                                                                        {{ $pet->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('pet_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="veterinarian_id">Veterinário*</label>
                                                            <select class="form-control @error('veterinarian_id') is-invalid
                                                            @enderror" id="veterinarian_id" name="veterinarian_id">
                                                                <option value="">Selecione o Veterinário</option>
                                                                @foreach($veterinarians as $veterinarian)
                                                                    <option value="{{ $veterinarian->id }}"
                                                                            {{ old('veterinarian_id') == $veterinarian->id ? 'selected' : '' }}>
                                                                        {{ $veterinarian->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('veterinarian_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="diagnosis">Diagnóstico*</label>
                                                            <input type="text" class="form-control @error('diagnosis')
                                                            is-invalid @enderror" id="diagnosis" name="diagnosis"
                                                                   placeholder="Ex: Raiva Canina" value="{{ old('diagnosis') }}">
                                                            @error('diagnosis')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6 col-md-4">
                                                        <div class="form-group">
                                                            <label for="treatment">Tratamento*</label>
                                                            <input type="text" class="form-control @error('treatment')
                                                            is-invalid @enderror" id="treatment" name="treatment"
                                                                     placeholder="Ex: Vacinação" value="{{ old('treatment') }}">
                                                            @error('treatment')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="date">Data*</label>
                                                            <input type="date" class="form-control @error('date')
                                                            is-invalid @enderror" id="date" name="date"
                                                            value="{{ old('date') }}">
                                                            @error('date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="observations">Observações</label>
                                                            <input type="text" class="form-control @error('observations')
                                                            is-invalid @enderror" id="observations" name="observations"
                                                                   placeholder="Ex: Cuidados especiais" value="{{ old('observations') }}">
                                                            @error('observations')
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

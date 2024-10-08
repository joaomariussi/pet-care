@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Pet')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/pets/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css')}}">
@endsection

@section('content')
    <section class="insert-pet">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('pets')}}">Pets</a></li>
                                    <li class="breadcrumb-item active">Novo Pet</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Pets</b>
                <p>Preencha o formulário abaixo para cadastrar um novo pet.</p>

                <form method="POST" action="{{route('pets.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['owner_id','medical_history_id', 'name',
                                    'date_birth', 'species', 'race', 'gender', 'color', 'weight', 'photo'])}}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome do Pet*</label>
                                                            <input type="text"
                                                                   class="form-control @error('name') is-invalid @enderror"
                                                                   id="name" name="name" placeholder="Nome do Pet"
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
                                                            <label for="owner_id">Proprietário*</label>
                                                            <select class="form-control @error('owner_id') is-invalid
                                                            @enderror" id="owner_id" name="owner_id">
                                                                <option value="">Selecione o proprietário</option>
                                                                @foreach($owners as $owner)
                                                                    <option value="{{ $owner->id }}"
                                                                            {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                                                        {{ $owner->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('owner_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="species">Espécie*</label>
                                                            <select class="form-control @error('species') is-invalid @enderror"
                                                                    id="species" name="species">
                                                                <option value="">Selecione a espécie</option>
                                                                <option value="Cachorro" {{ old('species') == 'Cachorro' ? 'selected' : '' }}>
                                                                    Cachorro
                                                                </option>
                                                                <option value="Gato" {{ old('species') == 'Gato' ? 'selected' : '' }}>
                                                                    Gato
                                                                </option>
                                                                <option value="Pássaro" {{ old('species') == 'Pássaro' ? 'selected' : '' }}>
                                                                    Pássaro
                                                                </option>
                                                                <option value="Roedor" {{ old('species') == 'Roedor' ? 'selected' : '' }}>
                                                                    Roedor
                                                                </option>
                                                                <option value="Réptil" {{ old('species') == 'Réptil' ? 'selected' : '' }}>
                                                                    Réptil
                                                                </option>
                                                                <option value="Outro" {{ old('species') == 'Outro' ? 'selected' : '' }}>
                                                                    Outro
                                                                </option>
                                                            </select>
                                                            @error('species')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="race">Raça*</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control @error('race')
                                                                is-invalid @enderror" id="race" name="race"
                                                                       placeholder="Raça do Pet"
                                                                       value="{{ old('race') }}">
                                                                <div class="input-group-text">
                                                                    <input class="form-check-input mt-0" type="checkbox"
                                                                           value="Sem raça" name="no_race" id="no_race"
                                                                            {{ old('no_race' ? 'checked' : '') }}>
                                                                    <label for="no_race" class="ms-1"
                                                                           style="font-size: 12px">
                                                                        Sem raça
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @error('race')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="color">Cor*</label>
                                                            <input type="text"
                                                                   class="form-control @error('color') is-invalid
                                                                   @enderror" id="color" name="color"
                                                                   placeholder="Cor do Pet" value="{{old('color')}}">
                                                            @error('color')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="weight">Peso (kg)*</label>
                                                            <input type="text"
                                                                   class="form-control @error('weight') is-invalid
                                                                   @enderror" id="weight" name="weight"
                                                                   placeholder="Peso do Pet" value="{{old('weight')}}">
                                                            @error('weight')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_birth">Data de Nascimento*</label>
                                                            <input type="date"
                                                                   class="form-control @error('date_birth') is-invalid
                                                                   @enderror" id="date_birth" name="date_birth"
                                                                   value="{{old('date_birth')}}">
                                                            @error('date_birth')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="gender">Gênero*</label>
                                                            <select class="form-control @error('gender') is-invalid @enderror"
                                                                    id="gender" name="gender">
                                                                <option value="Macho" {{ old('gender') == 'Macho' ? 'selected' : '' }}>
                                                                    Macho
                                                                </option>
                                                                <option value="Fêmea" {{ old('gender') == 'Fêmea' ? 'selected' : '' }}>
                                                                    Fêmea
                                                                </option>
                                                            </select>
                                                            @error('gender')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="photo">Foto do Pet*</label>
                                                            <input type="file"
                                                                   class="form-control @error('photo') is-invalid
                                                                    @enderror" id="photo" name="photo">
                                                            @error('photo')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="medical_history_id">Histórico Médico</label>
                                                            <select class="form-control @error('medical_history_id')
                                                            is-invalid @enderror" id="medical_history_id" name="medical_history_id">
                                                                <option value="">Sem histórico médico</option>
                                                                @foreach($medicalHistories as $medicalHistory)
                                                                    <option value="{{ $medicalHistory->id }}"
                                                                            {{ old('medical_history_id') == $medicalHistory->id ? 'selected' : '' }}>
                                                                        {{ $medicalHistory->diagnosis }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('medical_history_id')
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
    <script src="{{asset('js/scripts/pages/pets/pets.js')}}"></script>
@endsection

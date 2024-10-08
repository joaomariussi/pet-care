@php use Carbon\Carbon; @endphp
@extends('admin.layouts.menusLayout')

@section('title', 'Detalhes do Pet')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/pets/details.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css') }}">
@endsection

@section('content')
    <section class="details-pet">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{ route('pets') }}">Pets</a></li>
                                    <li class="breadcrumb-item active">Detalhes do Pet</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Detalhes do Pet - {{ $pet->name }}</b>
                <p class="sub-title-geral-etapas">Veja as informações do pet.</p>

                <div class="row g-3">
                    <div class="col-12">
                        <div class="accordion">
                            <div class="accordion-item">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#informacoesGerais-collapse" aria-expanded="true"
                                        aria-controls="informacoesGerais-collapse">
                                    <i class="fa-solid fa-circle-info font-medium-5"></i>
                                    <span class="ms-2">Informações Gerais</span>
                                </button>

                                <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                     aria-labelledby="informacoesGerais-headingOne">
                                    <div class="accordion-body">
                                        <fieldset>
                                            <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Nome do Pet</label>
                                                        <p class="form-control-plaintext">{{ $pet->name }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="owner_id">Proprietário</label>
                                                        <p class="form-control-plaintext">{{ $pet->owner->name }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="species">Espécie</label>
                                                        <p class="form-control-plaintext">{{ $pet->species }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="race">Raça</label>
                                                        <p class="form-control-plaintext">{{ $pet->race }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="color">Cor</label>
                                                        <p class="form-control-plaintext">{{ $pet->color }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="weight">Peso (kg)</label>
                                                        <p class="form-control-plaintext">{{ number_format($pet->weight, 2, ',', '.') }}
                                                            kg</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="date_birth">Data de Nascimento</label>
                                                        <p class="form-control-plaintext">{{ Carbon::parse($pet->date_birth)->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gênero</label>
                                                        <p class="form-control-plaintext">{{ $pet->gender }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="medical_history_id">Histórico Médico</label>
                                                        <p class="form-control-plaintext">
                                                            {{ $pet->medicalHistory ? $pet->medicalHistory->diagnosis : 'Sem histórico médico' }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="photo">Foto do Pet</label>
                                                        <div class="pet-image-container">
                                                            <img src="{{ $pet->photo ? asset($pet->photo) : asset('images/camera.png') }}"
                                                                 alt="Foto do Pet">
                                                        </div>
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
                    <a href="{{ route('pets.view-update', $pet->id) }}" class="btn button_save_forms">
                        <i class="fa-solid fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('pets') }}" class="btn button_cancel_forms">
                        <i class="fa-solid fa-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

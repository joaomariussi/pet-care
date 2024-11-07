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
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text mb-3">
                        <i class="fa-solid fa-paw me-2"></i> Detalhes do Pet - {{ $pet->name }}
                    </h3>
                    <p class="text-muted">Veja as informações detalhadas do pet.</p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Card para o Nome do Pet -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-dog fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Nome do Pet</h5>
                                <p class="card-text">{{ $pet->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Proprietário -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-user fa-2x text-info"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Proprietário</h5>
                                <p class="card-text">{{ $pet->owner->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Espécie -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-paw fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Espécie</h5>
                                <p class="card-text">{{ $pet->species }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Raça -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-dna fa-2x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Raça</h5>
                                <p class="card-text">{{ $pet->race }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Cor -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-palette fa-2x text-danger"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Cor</h5>
                                <p class="card-text">{{ $pet->color }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Peso -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-weight fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Peso (kg)</h5>
                                <p class="card-text">{{ number_format($pet->weight, 2, ',', '.') }} kg</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Data de Nascimento -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-calendar-day fa-2x text-info"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Data de Nascimento</h5>
                                <p class="card-text">{{ Carbon::parse($pet->date_birth)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Gênero -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-venus-mars fa-2x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Gênero</h5>
                                <p class="card-text">{{ $pet->gender }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para Histórico Médico -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-notes-medical fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Histórico Médico</h5>
                                <p class="card-text">{{ $pet->medicalHistory ? $pet->medicalHistory->diagnosis : 'Sem histórico médico' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Foto do Pet -->
                <div class="col-12">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary"><i class="fa-solid fa-camera me-2"></i>Foto do Pet</h5>
                            <div class="pet-image-container mt-3">
                                <img src="{{ $pet->photo ? asset($pet->photo) : asset('images/sem-foto.webp') }}"
                                     alt="Foto do Pet">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="text-center mt-4">
                <a href="{{ route('pets.view-update', $pet->id) }}" class="btn btn-outline-primary me-2">
                    <i class="fa-solid fa-edit me-2"></i>Editar
                </a>
                <a href="{{ route('pets') }}" class="btn btn-outline-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Voltar
                </a>
            </div>
        </div>
    </section>
@endsection

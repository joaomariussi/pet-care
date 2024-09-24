@php use Carbon\Carbon; @endphp
@extends('admin.layouts.menusLayout')

@section('title', 'Detalhes do Proprietário')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/owners/details.css') }}">
@endsection

@section('content')
    <section class="owner-details">
        <div class="row">
            <div class="col-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{ route('owners') }}">Proprietários</a></li>
                                    <li class="breadcrumb-item active">Detalhes do Proprietário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="title-geral-etapas">Detalhes do Proprietário - {{ $owner->name }}</h4>
                    </div>
                </div>

                <div class="row">
                    <!-- Informações Pessoais -->
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa-solid fa-user"></i> Informações Pessoais</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-id-card"></i>
                                        <span class="ml-3"><strong>Nome:</strong> {{ $owner->name }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-envelope"></i>
                                        <span class="ml-3"><strong>E-mail:</strong> {{ $owner->email }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-id-card"></i>
                                        <span class="ml-3"><strong>CPF:</strong> <span class="cpf-mask">{{ $owner->cpf }}</span></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-phone"></i>
                                        <span class="ml-3"><strong>Telefone:</strong> <span class="phone-mask">{{ $owner->telephone }}</span></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-mobile-alt"></i>
                                        <span class="ml-3"><strong>Celular:</strong> <span class="cell-phone-mask">{{ $owner->cell_phone }}</span></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-birthday-cake"></i>
                                        <span class="ml-3"><strong>Data de Nascimento:</strong> {{ Carbon::parse($owner->date_birth)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-venus-mars"></i>
                                        <span class="ml-3"><strong>Gênero:</strong> {{ $owner->gender }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Informações de Endereço -->
                    <div class="col-12 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa-solid fa-map-marker-alt"></i> Informações de Endereço</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-location-arrow"></i>
                                        <span class="ml-3"><strong>Endereço:</strong> {{ $owner->address }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-city"></i>
                                        <span class="ml-3"><strong>Bairro:</strong> {{ $owner->neighborhood }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-home"></i>
                                        <span class="ml-3"><strong>Número:</strong> {{ $owner->number }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-plus-circle"></i>
                                        <span class="ml-3"><strong>Complemento:</strong> {{ $owner->complement ?? 'N/A' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-envelope"></i>
                                        <span class="ml-3"><strong>CEP:</strong> <span class="cep-mask">{{ $owner->zip_code }}</span></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-city"></i>
                                        <span class="ml-3"><strong>Cidade:</strong> {{ $owner->city }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="fa-solid fa-map-signs"></i>
                                        <span class="ml-3"><strong>Estado:</strong> {{ $owner->state }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btnsSave mt-3 justify-content-between d-flex float-end">
                    <a href="{{ route('owners.view-update', $owner->id) }}" class="btn btn-outline-secondary">
                        <i class="fa-solid fa-pen"></i> Editar Proprietário
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <!-- jQuery Mask Plugin -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script src="{{ asset('js/scripts/pages/owners/owners.js') }}"></script>

    <script>
        $(document).ready(function(){
            // Máscara para CPF
            $('.cpf-mask').mask('000.000.000-00', {reverse: true});

            // Máscara para telefone fixo (com 8 dígitos)
            $('.phone-mask').mask('(00) 0000-0000');

            // Máscara para celular (com 9 dígitos)
            $('.cell-phone-mask').mask('(00) 00000-0000');

            // Máscara para CEP
            $('.cep-mask').mask('00000-000');
        });
    </script>
@endsection

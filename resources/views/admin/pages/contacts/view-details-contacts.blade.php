@extends('admin.layouts.menusLayout')

@section('title', 'Informações do Contato')

@section('content')
    <section class="details-products">
        <div class="row">
            <div class="col-12 col-xl-12">
                <!-- Breadcrumb with Divider Starts -->
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="">Contatos</a></li>
                                    <li class="breadcrumb-item"><a href="">Lista de Contatos</a></li>
                                    <li class="breadcrumb-item active">Detalhes do Contato</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>
                <!-- Default Breadcrumb Ends -->


                <!-- Título -->
                <b class="title-geral-etapas-sub">Detalhes do contato: {{$contact['name']}}</b>
                <!-- Instruções -->
                <p>Visualize abaixo os detalhes do contato selecionado!</p>

                <div class="row">
                    <div class="col-12 col-md-4 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Informações do Candidato</small>

                                <div class="info-container">
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="mb-3">
                                            <i class="fa-solid fa-scroll"></i>
                                            <span class="fw-bold">Nome:</span>
                                            <span class="w-100 d-block">{{$contact['name']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-envelope"></i>
                                            <span class="fw-bold">E-mail:</span>
                                            <span class="w-100 d-block">{{$contact['email']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-phone"></i>
                                            <span class="fw-bold">Telefone:</span>
                                            <span class="w-100 d-block">{{$contact['phone_number']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-map-marker"></i>
                                            <span class="fw-bold">Cidade - Estado</span>
                                            <span class="w-100 d-block">{{$contact['city_name']}} - {{$contact['state_uf']}}</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="fw-bold">Data de Cadastro:</span>
                                            <span class="w-100 d-block">{{\Carbon\Carbon::parse($contact['created_at'])->format('d/m/Y H:i:s')}}</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">Informações Extras</small>

                                <div class="info-container">
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li class="mb-3">
                                            <span class="fw-bold">Setor:</span>
                                            <span class="w-100 d-block">{{$contact['sectors']['name']}}</span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="fa-solid fa-file"></i>
                                            <span class="fw-bold">Assunto:</span>
                                            <span class="w-100 d-block">{{$contact['subject']}}</span>
                                        </li>

                                        <li>
                                            <i class="fa-solid fa-mail-reply"></i>
                                            <span class="fw-bold">Mensagem:</span>
                                            <span class="w-100 d-block">{{$contact['message']}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

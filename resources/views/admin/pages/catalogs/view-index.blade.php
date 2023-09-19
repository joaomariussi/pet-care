@extends('admin.layouts.menusLayout')

@section('title', 'Catálogos')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <section class="index-catalogs">
        <section id="breadcrumb-divider">
            <div class="row">
                <div class="card-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-cadastros">
                            <li class="breadcrumb-item"><a href="/"><i
                                        class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item">Gerenciamento</li>
                            <li class="breadcrumb-item">Catálogos</li>
                            <li class="breadcrumb-item active">Lista</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12 col-xl-12">
                <div class="card-content">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="catalogs-tab" data-bs-toggle="tab" href="#catalogs"
                               aria-controls="catalogs" role="tab"
                               aria-selected="true">
                                <i class="fa-solid fa-book"></i>
                                <span class="align-middle">Catálogos</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="catalogs" aria-labelledby="catalogs" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body cards-geral">
                                            <i class="fa-solid fa-book font-large-1 color-yellow-geral"></i>
                                            <div class="card-produtos-quantidade ms-3">
                                                <h5 class="mb-0 me-2 itenscadastrados registered-users color-yellow-geral">0</h5>
                                                <b class="text-muted">Catálogos Cadastrados</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <b class="title-geral-etapas">Lista de Catálogos</b>
                                            <a href="{{route('catalogs.view-create')}}"
                                               class="btn button_register float-end ms-2 buttonInsert">
                                                <i class='fa-solid fa-plus'></i> Novo Catálogo
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

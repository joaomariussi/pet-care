@extends('admin.layouts.menusLayout')

@section('title', 'Lista de Vagas Cadastradas')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <section class="index-sectors">
        <section id="breadcrumb-divider">
            <div class="row">
                <div class="card-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-cadastros">
                            <li class="breadcrumb-item"><a href="/"><i
                                        class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item">Gerenciamento</li>
                            <li class="breadcrumb-item">Trabalhe Conosco</li>
                            <li class="breadcrumb-item active">Lista de Vagas</li>
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
                            <a class="nav-link active" href="{{route('jobs')}}"
                               aria-controls="contacts"
                               aria-selected="true">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <span class="align-middle">Vagas</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="contacts" aria-labelledby="contacts" role="tabpanel">

                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body cards-geral">
                                            <i class="fa-regular fa-pen-to-square font-large-1 color-blue-geral"></i>
                                            <div class="card-produtos-quantidade ms-3">
                                                <h5 class="mb-0 me-2 itenscadastrados registered-users color-blue-geral">{{$totalJobs}}</h5>
                                                <b class="text-muted">Vagas Cadastradas</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body align-items-center">
                                            <b class="title-geral-etapas">Lista de vagas cadastradas</b>
                                            <a href="{{route('jobs.view-create')}}"
                                               class="btn button_register float-end ms-2 buttonInsert">
                                                <i class='fa-solid fa-plus'></i> Nova Vaga
                                            </a>

                                            <div class="mt-4 alert alert-info alert-dismissible" role="alert">
                                                <div class="alert-message">
                                                    <span>
                                                        <i class="fa-solid fa-info-circle"></i>
                                                        <b>Informação:</b>
                                                        Para visualizar os currículos recebidos de cada vaga,
                                                        clique no botão <span class="fw-bold"><i class="fa-solid fa-file me-0"></i></span> na coluna <b>Ações</b>,
                                                        da vaga desejada.
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="mt-3">
                                                <div class="card-dashboard">
                                                    {{$dataTable->table()}}
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
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    {{$dataTable->scripts()}}
@endsection

@extends('admin.layouts.menusLayout')

@section('title', 'Currículos Recebidos')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <section class="index-received-jobs">
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
                            <li class="breadcrumb-item">Lista de Vagas</li>
                            <li class="breadcrumb-item active">Currículos Recebidos</li>
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
                                <span class="align-middle">Currículos</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="contacts" aria-labelledby="contacts" role="tabpanel">

                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body cards-geral">
                                            <i class="fa-solid fa-file font-large-1 color-blue-geral"></i>
                                            <div class="card-produtos-quantidade ms-3">
                                                <h5 class="mb-0 me-2 itenscadastrados registered-users color-blue-geral">0</h5>
                                                <b class="text-muted">Currículos Recebidos</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body align-items-center">
                                            <b class="title-geral-etapas">Lista de Currículos - {{$jobs['name']}}</b>
                                            <p>
                                                Encontre aqui os currículos recebidos para a vaga!
                                            </p>
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

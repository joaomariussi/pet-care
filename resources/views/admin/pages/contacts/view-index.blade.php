@extends('admin.layouts.menusLayout')

@section('title', 'Contatos')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <section class="index-contacts">
        <section id="breadcrumb-divider">
            <div class="row">
                <div class="card-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-cadastros">
                            <li class="breadcrumb-item"><a href="/"><i
                                        class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item">Gerenciamento</li>
                            <li class="breadcrumb-item">Contatos</li>
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
                            <a class="nav-link active" id="contacts-tab" data-bs-toggle="tab" href="#contacts"
                               aria-controls="contacts" role="tab"
                               aria-selected="true">
                                <i class="fa-solid fa-address-book"></i>
                                <span class="align-middle">Contatos</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="contacts" aria-labelledby="contacts" role="tabpanel">

                            <!-- Início das informações de Permissões Cadastradas-->
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body cards-geral">
                                            <i class="fa-solid fa-solid fa-address-book font-large-1 color-yellow-geral"></i>
                                            <div class="card-produtos-quantidade ms-3">
                                                <h5 class="mb-0 me-2 itenscadastrados registered-users color-yellow-geral">0</h5>
                                                <b class="text-muted">Total de Contatos</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <b class="title-geral-etapas">Lista de Contatos </b>
                                            <p>Essa é a lista de todos os contatos recebidos através do formulário de contato do site.</p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
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
    </section>
@endsection



@section('page-scripts')
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    {{$dataTable->scripts()}}
@endsection

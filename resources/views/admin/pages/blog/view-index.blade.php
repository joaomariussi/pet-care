@extends('admin.layouts.menusLayout')

@section('title', 'Blog')

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
                            <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                            <li class="breadcrumb-item active">Notícias</li>
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
                            <a class="nav-link active" data-bs-toggle="tab" href="{{route('blog')}}"
                               aria-controls="contacts" role="tab"
                               aria-selected="true">
                                <i class="fa-solid fa-newspaper"></i>
                                <span class="align-middle">Notícias</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contacts-tab" href="{{route('blog.view-index-categories')}}"
                               aria-controls="contacts" role="tab"
                               aria-selected="true">
                                <i class="fa-solid fa-list"></i>
                                <span class="align-middle">Categorias Notícias</span>
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
                                            <i class="fa-solid fa-newspaper font-large-1"></i>
                                            <div class="card-produtos-quantidade ms-3">
                                                <h5 class="mb-0 me-2 itenscadastrados registered-users">0</h5>
                                                <b class="text-muted">Notícias Cadastradas</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <b class="title-geral-etapas">Lista de Notícias do Blog</b>
                                            <a href="{{route('blog.view-create-notices')}}"
                                               class="btn button_register float-end ms-2 buttonInsert">
                                                <i class='fa-solid fa-plus'></i> Novo Notícia
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

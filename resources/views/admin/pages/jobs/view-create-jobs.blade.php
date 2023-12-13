@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Vagas')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/user/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css')}}">
@endsection

@section('content')
    <section class="insert-user">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('jobs')}}">Trabalhe Conosco</a></li>
                                    <li class="breadcrumb-item active">Nova Vaga</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Vagas</b>
                <p>Preencha o formulário abaixo para cadastrar uma nova vaga.</p>

                <form method="POST" action="{{route('jobs.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','sector','status', 'description'])}}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span><small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show" aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nome"
                                                                   value="{{old('name')}}">
                                                            @error('name')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="sector_id">Setor</label>
                                                            <select class="form-select @error('sector_id') is-invalid @enderror" id="sector_id" name="sector_id">
                                                                <option value="" selected disabled>Escolha um setor</option>
                                                                @foreach($sectors as $sector)
                                                                    <option value="{{$sector->id}}">{{$sector['name']}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('sector')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4 col-xl-4">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                                                <option value="" selected disabled>Escolha um status</option>
                                                                <option value="1">Ativo</option>
                                                                <option value="0">Inativo</option>
                                                            </select>
                                                            @error('status')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="description">Descrição</label>
                                                            <div id="full-wrapper">
                                                                <div id="full-container">
                                                                    <div class="editor">
                                                                        {!! old('description') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="description"
                                                                   class="@error('description') is-invalid @enderror"
                                                                   id="description" value="{{old('description')}}">
                                                            @error('description')
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
                        <button type="submit" class="btn button_save_forms saveForm"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('vendor-scripts')
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/editors/editor-quill.js')}}"></script>
    <script src="{{asset('js/scripts/pages/jobs/description-jobs.js')}}"></script>
@endsection

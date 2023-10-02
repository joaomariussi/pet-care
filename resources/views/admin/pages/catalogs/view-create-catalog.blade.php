@extends('admin.layouts.menusLayout')

@section('title', 'Inserir Catálogo')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/catalog/catalog-index.css') }}">
@endsection

@section('content')
    <section class="insert-catalogs">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('user')}}">Catálogos</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('user')}}">Lista</a></li>
                                    <li class="breadcrumb-item active">Novo Catálogo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Catálogos</b>
                <p>Preencha o formulário abaixo para cadastrar um novo catálogo.</p>

                <form method="POST" action="">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-4 col-xl-4">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','email','password'])}}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#pdf-collapse"
                                            aria-expanded="true" aria-controls="pdf-collapse">
                                        <i class="fa-solid fa-cloud-arrow-down font-medium-5"></i>
                                        <span class="ms-2">Arquivo PDF</span>
                                    </button>

                                    <div id="pdf-collapse" class="accordion-collapse collapse show" aria-labelledby="pdf-headingOne">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="uploader">
                                                        <input id="file-upload" type="file" name="fileUpload"
                                                               accept="application/pdf" />

                                                        <label for="file-upload" id="file-drag">
                                                            <embed id="pdf-embed" src="#" type="application/pdf" width="500" height="400" style="display: none;">

                                                            <div id="file-drag">
                                                                <img id="file-image" src="#" alt="Preview" class="hidden">
                                                                <div id="start">
                                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                                    <div>Selecione um arquivo ou arraste aqui</div>
                                                                    <div id="notimage" class="hidden">Selecione uma imagem</div>
                                                                    <span id="file-upload-btn" class="btn btn-primary">
                                                                    Selecione um arquivo
                                                                    </span>
                                                                </div>
                                                                <div id="response" class="hidden">
                                                                    <div id="messages"></div>
                                                                    <progress class="progress" id="file-progress" value="0">
                                                                        <span>0</span>%
                                                                    </progress>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-8 col-xl-8">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','email','password'])}}" type="button" data-bs-toggle="collapse" data-bs-target="#avatar-collapse"
                                            aria-expanded="true" aria-controls="avatar-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span>
                                    </button>

                                    <div id="avatar-collapse" class="accordion-collapse collapse show" aria-labelledby="avatar-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name" class="form-label">Nome</label>
                                                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
                                                            @error('name')
                                                            {{form_collapse_errors_message('name', $message)}}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="status" class="form-label">Status</label>
                                                            <select class="form-select" id="status" name="status">
                                                                <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Inativo</option>
                                                                <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Ativo</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-12 col-xl-12">
                                                        <div class="form-group">
                                                            <label hidden class="mb-3" for="image">Avatar</label>
                                                            <div class="max-width">
                                                                <div class="imageContainer">
                                                                    <img src="{{asset('images/background/camera.png')}}" alt="Selecione uma imagem" id="imgPhoto">
                                                                </div>
                                                            </div>
                                                            <input type="file" id="avatar" name="avatar" accept="image/*">

                                                            <small class="label-img">
                                                                IMAGEM DO CATÁLOGO
                                                            </small>

                                                            <small class="type_permited">
                                                                Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                                <br>
                                                                Tamanho: 525x525px
                                                            </small>
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

                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn button_save_forms">
                            <i class="fa-solid fa-save"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset(mix('js/scripts/extensions/upload-pdf.js'))}}"></script>
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>
@endsection

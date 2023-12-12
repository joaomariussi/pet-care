@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Notícias do Blog')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/catalog/catalog-index.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css')}}">
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
                                    <li class="breadcrumb-item"><a href="{{route('sectors')}}">Blog</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('sectors')}}">Notícias</a></li>
                                    <li class="breadcrumb-item active">Nova Notícia</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Notícias</b>
                <p>Preencha o formulário abaixo para cadastrar uma nova notícias do blog.</p>

                <form method="POST" action="{{route('blog.create-notices')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12 col-md-4 col-xl-4">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['avatar'])}}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#avatar-collapse"
                                            aria-expanded="true" aria-controls="avatar-collapse">
                                        <i class="fa-solid fa-cloud-arrow-down font-medium-5"></i>
                                        <span class="ms-2">Imagem</span>
                                    </button>

                                    <div id="avatar-collapse" class="accordion-collapse collapse show" aria-labelledby="pdf-headingOne">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label hidden class="mb-3" for="image">image</label>
                                                        <div class="max-width">
                                                            <div class="imageContainer">
                                                                <img src="{{asset('images/camera.png')}}" alt="Selecione uma imagem" id="imgPhoto">
                                                            </div>
                                                        </div>
                                                        <input type="file" id="avatar" name="avatar" accept="image/*">

                                                        <small class="label-img">
                                                            IMAGEM DA NOTÍCIA
                                                        </small>

                                                        <small class="type_permited">
                                                            Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                            <br>
                                                            Tamanho: 800x560px
                                                        </small>
                                                    </div>
                                                    @error('avatar')
                                                    {{form_collapse_errors_message('avatar', $message)}}
                                                    @enderror
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
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['avatar'])}}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#pdf-collapse"
                                            aria-expanded="true" aria-controls="pdf-collapse">
                                        <i class="fa-solid fa-info-circle font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span>
                                    </button>

                                    <div id="pdf-collapse" class="accordion-collapse collapse show" aria-labelledby="pdf-headingOne">
                                        <div class="accordion-body">
                                            <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">Título da Notícia</label>
                                                        <input type="text" class="form-control erroForm @error('title') is-invalid @enderror"
                                                               id="title" name="title" value="{{old('title')}}">
                                                    </div>
                                                    @error('title')
                                                    {{form_collapse_errors_message('title', $message)}}
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="subtitle">Subtítulo da Notícia</label>
                                                        <input type="text" class="form-control erroForm @error('subtitle') is-invalid @enderror"
                                                               id="subtitle" name="subtitle" value="{{old('subtitle')}}">
                                                    </div>
                                                    @error('subtitle')
                                                        {{form_collapse_errors_message('subtitle', $message)}}
                                                    @enderror
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="description">Conteúdo</label>
                                                        <div id="full-wrapper">
                                                            <div id="full-container">
                                                                <div class="editor">
                                                                    {!! old('content') !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="content"
                                                               id="content" value="{{old('content')}}">
                                                        @error('content')
                                                        {!! form_collapse_errors_message('content', strtoupper($message)) !!}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="category_id">Categoria</label>
                                                        <select class="form-select erroForm @error('category_id') is-invalid @enderror"
                                                                id="category_id" name="category_id">
                                                            <option value="" selected disabled>Selecione uma categoria</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                                                    {{$category['name-category']}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        {{form_collapse_errors_message('category_id', $message)}}
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-select erroForm @error('status') is-invalid @enderror"
                                                                id="status" name="status">
                                                            <option value="1" {{old('status') == '1' ? 'selected' : ''}}>Ativo</option>
                                                            <option value="0" {{old('status') == '0' ? 'selected' : ''}}>Inativo</option>
                                                        </select>
                                                    </div>
                                                    @error('status')
                                                    {{form_collapse_errors_message('status', $message)}}
                                                    @enderror
                                                </div>
                                            </div>
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

@section('vendor-scripts')
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/katex.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/highlight.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/editors/editor-quill.js')}}"></script>
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>

    <script>
        $('.ql-editor').on('keyup', function () {
            $('#content').val($(this).html())
        })
    </script>
@endsection

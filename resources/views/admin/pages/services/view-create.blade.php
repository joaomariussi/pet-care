@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Serviço')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/services/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css') }}">
@endsection

@section('content')
    <section class="insert-positions">
        <div class="row">
            <div class="col-12 col-xl-12">
                <section id="breadcrumb-divider">
                    <div class="row">
                        <div class="card-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-cadastros">
                                    <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                                    <li class="breadcrumb-item">Gerenciamento</li>
                                    <li class="breadcrumb-item"><a href="{{route('services')}}">Serviços</a></li>
                                    <li class="breadcrumb-item active">Novo Serviço</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Serviço</b>
                <p>Preencha o formulário abaixo para cadastrar um novo serviço.</p>

                <form method="POST" action="{{route('services.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                            {{form_collapse_errors($errors, ['category_id','name','description', 'price',
                                            'duration'])}}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações do Cadastro</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Nome*</label>
                                                            <input type="text" class="form-control @error('name')
                                                            is-invalid @enderror" id="name" name="name"
                                                                   placeholder="Nome do Serviço" value="{{old('name')}}">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="description">Descrição</label>
                                                            <textarea class="form-control @error('description')
                                                             is-invalid @enderror" id="description" name="description"
                                                                      placeholder="Descrição do Serviço"
                                                                      rows="1">{{old('description')}}
                                                            </textarea>
                                                            @error('description')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="price">Preço*</label>
                                                            <input type="text" class="form-control @error('price')
                                                             is-invalid @enderror" id="price" name="price"
                                                                   placeholder="Informe o preço do serviço"
                                                                   value="{{old('price')}}">
                                                            @error('price')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="category_id">Categoria*</label>
                                                            <select class="form-control @error('category_id')
                                                            is-invalid @enderror" id="category_id" name="category_id">
                                                                <option value="">Selecione a categoria do serviço</option>
                                                                @foreach($categories as $category)
                                                                    <option value="{{$category->id}}"
                                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                        {{$category->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('category_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="duration">Duração*</label>
                                                            <input type="time" class="form-control @error('duration')
                                                            is-invalid @enderror" id="duration" name="duration"
                                                                   value="{{ old('duration') }}">
                                                            @error('duration')
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
                        <button type="submit" class="btn button_save_forms saveForm">
                            <i class="fa-solid fa-floppy-disk"></i> Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/services/services.js')}}"></script>
@endsection

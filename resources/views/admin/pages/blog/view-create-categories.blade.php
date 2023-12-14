@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Categorias Notícias')

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
                                    <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('blog.view-index-categories')}}">Categorias Notícias</a></li>
                                    <li class="breadcrumb-item active">Nova Categoria</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Categorias</b>
                <p>Preencha o formulário abaixo para cadastrar uma nova categoria para as notícias do blog.</p>

                <form method="POST" action="{{route('blog.create-categories')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name_category', 'status'])}}"
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
                                                        <label for="name_category" class="form-label">Nome da Categoria</label>
                                                        <input type="text" class="form-control erroForm @error('name_category') is-invalid @enderror"
                                                               id="name_category" name="name_category" value="{{old('name_category')}}">
                                                        @error('name_category')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="status" class="form-label">Status</label>
                                                        <select class="form-select erroForm @error('status') is-invalid @enderror"
                                                                id="status" name="status">
                                                            <option value="1" {{old('status') == '1' ? 'selected' : ''}}>Ativo</option>
                                                            <option value="0" {{old('status') == '0' ? 'selected' : ''}}>Inativo</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
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

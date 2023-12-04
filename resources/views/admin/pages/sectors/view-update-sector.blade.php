@extends('admin.layouts.menusLayout')

@section('title', 'Editar Setor')

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
                                    <li class="breadcrumb-item"><a href="{{route('sectors')}}">Setores</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('sectors')}}">Lista</a></li>
                                    <li class="breadcrumb-item active">Editar Setor</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Setor: {{$sector['name']}} </b>
                <p>Preencha o formulário abaixo editar o setor desejado.</p>

                <form method="POST" action="{{route('sectors.update', $sector['id'])}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-4 col-xl-4">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['avatar'])}}"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#pdf-collapse"
                                            aria-expanded="true" aria-controls="pdf-collapse">
                                        <i class="fa-solid fa-cloud-arrow-down font-medium-5"></i>
                                        <span class="ms-2">Imagem</span>
                                    </button>

                                    <div id="pdf-collapse" class="accordion-collapse collapse show" aria-labelledby="pdf-headingOne">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label hidden class="mb-3" for="image">image</label>
                                                        <div class="max-width">
                                                            <div class="imageContainer">
                                                                @isset($sector['avatar'])
                                                                    <img src="data:image/jpeg;base64,{{$sector['avatar']}}" alt="Logo Usuário" id="imgPhoto">
                                                                @else
                                                                    <img src="{{asset('images/background/camera.png')}}" alt="Selecione uma imagem" id="imgPhoto">
                                                                @endisset
                                                            </div>
                                                        </div>
                                                        <input type="file" id="avatar" name="avatar" accept="image/*">

                                                        <small class="label-img">
                                                            IMAGEM DO SETOR
                                                        </small>

                                                        <small class="type_permited">
                                                            Permitido *.jpeg, *.jpg, *.png, *.gif, *.svg, *.webp
                                                            <br>
                                                            Tamanho: 525x525px
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
                                    <button class="accordion-button erroInfoGerais {{form_collapse_errors($errors, ['name','description','status'])}}" type="button" data-bs-toggle="collapse" data-bs-target="#avatar-collapse"
                                            aria-expanded="true" aria-controls="avatar-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span>
                                    </button>

                                    <div id="avatar-collapse" class="accordion-collapse collapse show" aria-labelledby="avatar-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="name">Nome</label>
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                                                   name="name" placeholder="Nome do setor" value="{{old('name')?:$sector['name']}}">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="description">Descrição</label>
                                                            <textarea class="form-control @error('description') is-invalid @enderror" rows="4" id="description"
                                                                      name="description" placeholder="Descrição do setor">
                                                                {{old('description')?:$sector['description']}}
                                                            </textarea>
                                                            @error('description')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                                                <option value="1" {{(old('status') == '1' || $sector['status'] == '1') ? 'selected' : ''}}>Ativo</option>
                                                                <option value="0" {{(old('status') == '0' || $sector['status'] == '0') ? 'selected' : ''}}>Inativo</option>
                                                            </select>
                                                            @error('status')
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
    <script src="{{asset(mix('js/scripts/extensions/upload-imgs.js'))}}"></script>
@endsection

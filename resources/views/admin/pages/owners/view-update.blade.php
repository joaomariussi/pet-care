@extends('admin.layouts.menusLayout')

@section('title', 'Editar Proprietários')

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
                                    <li class="breadcrumb-item"><a href="{{route('owners')}}">Proprietários</a></li>
                                    <li class="breadcrumb-item active">Editar Proprietário</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Editar Proprietário - {{$owner->nome}}</b>
                <p class="sub-title-geral-etapas">Edite as informações do proprietário</p>

                <form method="POST" action="{{route('owners.update', $owner->id)}}" class="form form-insert-user">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações Gerais</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="nome">Nome*</label>
                                                            <input type="text" class="form-control @error('nome') is-invalid @enderror"
                                                                   id="nome" name="nome" required placeholder="Nome do Proprietário"
                                                                   value="{{ old('nome') ?? $owner->nome }}">
                                                            @error('nome')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">E-mail*</label>
                                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                                   id="email" name="email" required placeholder="Informe um e-mail válido"
                                                                   value="{{ old('email') ?? $owner->email }}">
                                                            @error('email')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="cpf">CPF*</label>
                                                            <input type="text" class="form-control @error('cpf') is-invalid @enderror"
                                                                   id="cpf" name="cpf" required placeholder="Informe um CPF válido"
                                                                   maxlength="14" value="{{ old('cpf') ?? $owner->cpf }}">
                                                            @error('cpf')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="telefone">Telefone*</label>
                                                            <input type="text" class="form-control @error('telefone') is-invalid @enderror"
                                                                   id="telefone" name="telefone" required
                                                                   placeholder="Informe um telefone válido" maxlength="15"
                                                                   value="{{ old('telefone') ?? $owner->telefone }}">
                                                            @error('telefone')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="celular">Celular</label>
                                                            <input type="text" class="form-control @error('celular') is-invalid @enderror"
                                                                   id="celular" name="celular" placeholder="Informe um celular válido"
                                                                   maxlength="15" value="{{ old('celular') ?? $owner->celular }}">
                                                            @error('celular')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="data_nasc">Data de Nascimento*</label>
                                                            <input type="date" class="form-control @error('data_nasc') is-invalid @enderror"
                                                                   id="data_nasc" name="data_nasc" required
                                                                   value="{{ old('data_nasc') ?? $owner->data_nasc }}">
                                                            @error('data_nasc')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="genero">Gênero*</label>
                                                            <select class="form-select @error('genero') is-invalid @enderror" required
                                                                    id="genero" name="genero">
                                                                <option value="" selected>Selecione o gênero</option>
                                                                <option value="Masculino"
                                                                    {{ old('genero', $owner->genero) == 'Masculino' ? 'selected' : '' }}>
                                                                    Masculino
                                                                </option>
                                                                <option value="Feminino"
                                                                    {{ old('genero', $owner->genero) == 'Feminino' ? 'selected' : '' }}>
                                                                    Feminino
                                                                </option>
                                                                <option value="Outro"
                                                                    {{ old('genero', $owner->genero) == 'Outro' ? 'selected' : '' }}>
                                                                    Outro
                                                                </option>
                                                            </select>
                                                            @error('genero')
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

                    <!-- Informações de Endereço -->
                    <div class="accordion mt-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoEndereco" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesEndereco-collapse"
                                            aria-expanded="true" aria-controls="informacoesEndereco-collapse">
                                        <i class="fa-solid fa-location-dot font-medium-5"></i>
                                        <span class="ms-2">Endereço</span>
                                    </button>

                                    <div id="informacoesEndereco-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesEndereco-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="endereco">Endereço*</label>
                                                            <input type="text" class="form-control @error('endereco') is-invalid @enderror"
                                                                   id="endereco" name="endereco" required
                                                                   placeholder="Preencha o seu endereço"
                                                                   value="{{ old('endereco') ?? $owner->endereco }}">
                                                            @error('endereco')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="bairro">Bairro*</label>
                                                            <input type="text" class="form-control @error('bairro') is-invalid @enderror"
                                                                   id="bairro" name="bairro" required placeholder="Informe o bairro"
                                                                   value="{{ old('bairro') ?? $owner->bairro }}">
                                                            @error('bairro')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="numero">Número*</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control @error('numero') is-invalid @enderror"
                                                                       id="numero" name="numero" required placeholder="Informe o número"
                                                                       value="{{ old('numero') ?? $owner->numero }}" maxlength="10">
                                                                <div class="input-group-text">
                                                                    <input class="form-check-input mt-0" type="checkbox" value="S/N" name="s_n"
                                                                           id="s_n" {{ old('s_n', $owner->s_n) == 'S/N' ? 'checked' : '' }}>
                                                                    <label for="s_n" class="ms-1" style="font-size: 12px">S/N</label>
                                                                </div>
                                                            </div>
                                                            @error('numero')
                                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="complemento">Complemento</label>
                                                            <input type="text" class="form-control @error('complemento') is-invalid @enderror"
                                                                   id="complemento" name="complemento"
                                                                   placeholder="Informe um complemento ao endereço"
                                                                   value="{{ old('complemento') ?? $owner->complemento }}">
                                                            @error('complemento')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="cep">CEP*</label>
                                                            <input type="text" class="form-control @error('cep') is-invalid @enderror"
                                                                   id="cep" name="cep" placeholder="Informe um CEP válido" maxlength="9"
                                                                   value="{{ old('cep') ?? $owner->cep }}">
                                                            @error('cep')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <!-- Incluindo a view para a lista de estados -->
                                                        @include('_includes.states', ['selected' => old('estado') ?? $owner->estado])
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="cidade">Cidade*</label>
                                                            <input type="text" class="form-control @error('cidade') is-invalid @enderror"
                                                                   id="cidade" name="cidade" placeholder="Informe uma cidade válida"
                                                                   value="{{ old('cidade') ?? $owner->cidade }}">
                                                            @error('cidade')
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
    <script src="{{asset('js/scripts/pages/owners/owners.js')}}"></script>
@endsection

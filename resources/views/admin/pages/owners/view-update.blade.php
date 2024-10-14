@extends('admin.layouts.menusLayout')

@section('title', 'Editar Proprietários')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/owners/create.css') }}">
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

                <b class="title-geral-etapas">Editar Proprietário - {{$owner->name}}</b>
                <p class="sub-title-geral-etapas">Edite as informações do proprietário</p>

                <form method="POST" action="{{route('owners.update', $owner->id)}}" class="form form-insert-user">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['name','cpf','email', 'telephone', 'cell_phone',
                                    'date_birth','gender', 'address','neighborhood', 'number', 'zip_code', 'city','state'])}}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações do Cadastro</span>
                                        <small class="ms-1">(Obrigatório)</small>
                                    </button>

                                    <div id="informacoesGerais-collapse" class="accordion-collapse collapse show"
                                         aria-labelledby="informacoesGerais-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="name">Nome*</label>
                                                            <input type="text" class="form-control @error('name')
                                                            is-invalid @enderror" id="name" name="name" required
                                                                   placeholder="Nome do Proprietário"
                                                                   value="{{ old('name') ?? $owner->name }}">
                                                            @error('name')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="email">E-mail*</label>
                                                            <input type="text" class="form-control
                                                            @error('email') is-invalid @enderror" id="email" name="email"
                                                                   required placeholder="Informe um e-mail válido"
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
                                                            <input type="text" class="form-control @error('cpf')
                                                            is-invalid @enderror" id="cpf" name="cpf" required
                                                                   placeholder="Informe um CPF válido" maxlength="14"
                                                                   value="{{ old('cpf') ?? $owner->cpf }}">
                                                            @error('cpf')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="telephone">Telefone*</label>
                                                            <input type="text" class="form-control @error('telephone')
                                                            is-invalid @enderror" id="telephone" name="telephone" required
                                                                   placeholder="Informe um telefone válido" maxlength="15"
                                                                   value="{{ old('telephone') ?? $owner->telephone }}">
                                                            @error('telephone')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="cell_phone">Celular</label>
                                                            <input type="text" class="form-control @error('cell_phone')
                                                            is-invalid @enderror" id="cell_phone" name="cell_phone"
                                                                   placeholder="Informe um celular válido" maxlength="15"
                                                                   value="{{ old('cell_phone') ?? $owner->cell_phone }}">
                                                            @error('cell_phone')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="date_birth">Data de Nascimento*</label>
                                                            <input type="date" class="form-control @error('date_birth')
                                                            is-invalid @enderror" id="date_birth" name="date_birth" required
                                                                   value="{{ old('date_birth') ?? $owner->date_birth }}">
                                                            @error('date_birth')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="gender">Gênero*</label>
                                                            <select class="form-select @error('gender') is-invalid
                                                            @enderror" required id="gender" name="gender">
                                                                <option value="" selected>Selecione o gênero</option>
                                                                <option value="Masculino"
                                                                    {{ old('gender', $owner->gender) == 'Masculino' ? 'selected' : '' }}>
                                                                    Masculino
                                                                </option>
                                                                <option value="Feminino"
                                                                    {{ old('gender', $owner->gender) == 'Feminino' ? 'selected' : '' }}>
                                                                    Feminino
                                                                </option>
                                                                <option value="Outro"
                                                                    {{ old('gender', $owner->gender) == 'Outro' ? 'selected' : '' }}>
                                                                    Outro
                                                                </option>
                                                            </select>
                                                            @error('gender')
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
                                    <button class="accordion-button erroInfoEndereco collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#informacoesEndereco-collapse"
                                            aria-expanded="true" aria-controls="informacoesEndereco-collapse">
                                        <i class="fa-solid fa-location-dot font-medium-5"></i>
                                        <span class="ms-2">Endereço</span>
                                    </button>

                                    <div id="informacoesEndereco-collapse" class="accordion-collapse collapse"
                                         aria-labelledby="informacoesEndereco-headingOne">
                                        <div class="accordion-body">
                                            <fieldset>
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="address">Endereço*</label>
                                                            <input type="text" class="form-control @error('address')
                                                            is-invalid @enderror" id="address" name="address" required
                                                                   placeholder="Preencha o endereço"
                                                                   value="{{ old('address') ?? $owner->address }}">
                                                            @error('address')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="neighborhood">Bairro*</label>
                                                            <input type="text" class="form-control @error('neighborhood')
                                                            is-invalid @enderror" id="neighborhood" name="neighborhood" required 7
                                                                   placeholder="Informe o bairro"
                                                                   value="{{ old('neighborhood') ?? $owner->neighborhood }}">
                                                            @error('neighborhood')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="number">Número*</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control @error('number')
                                                                is-invalid @enderror" id="number" name="number"
                                                                       placeholder="Informe o número"
                                                                       value="{{ old('number') ?? $owner->number }}"
                                                                       maxlength="10">
                                                                <div class="input-group-text">
                                                                    <input class="form-check-input mt-0" type="checkbox"
                                                                           value="S/N" name="s_n" id="s_n"
                                                                        {{ old('s_n', $owner->s_n) == 'S/N' ? 'checked' : '' }}>
                                                                    <label for="s_n" class="ms-1" style="font-size: 12px">
                                                                        S/N
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @error('number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="complement">Complemento</label>
                                                            <input type="text" class="form-control @error('complement')
                                                            is-invalid @enderror" id="complement" name="complement"
                                                                   placeholder="Informe um complemento ao endereço"
                                                                   value="{{ old('complement') ?? $owner->complement }}">
                                                            @error('complement')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="zip_code">CEP*</label>
                                                            <input type="text" class="form-control @error('zip_code')
                                                            is-invalid @enderror" id="zip_code" name="zip_code" required
                                                                   placeholder="Informe um CEP válido" maxlength="9"
                                                                   value="{{ old('zip_code') ?? $owner->zip_code }}">
                                                            @error('zip_code')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <!-- Incluindo a view para a lista de estados -->
                                                        @include('_includes.states', ['selected' => old('state') ??
                                                        $owner->state])
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label for="city">Cidade*</label>
                                                            <input type="text" class="form-control @error('city')
                                                            is-invalid @enderror" id="city" name="city" required
                                                                   placeholder="Informe uma cidade válida"
                                                                   value="{{ old('city') ?? $owner->city }}">
                                                            @error('city')
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

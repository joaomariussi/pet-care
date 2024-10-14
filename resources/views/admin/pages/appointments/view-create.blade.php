@extends('admin.layouts.menusLayout')

@section('title', 'Cadastro de Agendamento')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/appointments/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css')}}">
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
                                    <li class="breadcrumb-item"><a href="{{route('appointments')}}">Agendamentos</a></li>
                                    <li class="breadcrumb-item active">Novo Agendamento</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Cadastro de Agendamento</b>
                <p>Preencha o formulário abaixo para cadastrar um novo agendamento.</p>

                <form method="POST" action="{{route('appointments.create')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['pet_id','owner_id', 'service_id', 'employee_id',
                                    'schedule_date', 'schedule_time', 'observations'])}}"
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
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="pet_id">Pet*</label>
                                                            <select class="form-control @error('pet_id') is-invalid
                                                            @enderror" id="pet_id" name="pet_id">
                                                                <option value="">Selecione o Pet</option>
                                                                @foreach($pets as $pet)
                                                                    <option value="{{ $pet->id }}"
                                                                            {{ old('pet_id') == $pet->id ? 'selected' : '' }}>
                                                                        {{ $pet->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('pet_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="owner_id">Proprietário*</label>
                                                            <select class="form-control @error('owner_id') is-invalid
                                                            @enderror" id="owner_id" name="owner_id">
                                                                <option value="">Selecione o proprietário</option>
                                                                @foreach($owners as $owner)
                                                                    <option value="{{ $owner->id }}"
                                                                            {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                                                        {{ $owner->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('owner_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="service_id">Serviço*</label>
                                                            <select class="form-control @error('service_id') is-invalid
                                                            @enderror" id="service_id" name="service_id">
                                                                <option value="">Selecione o serviço prestado</option>
                                                                @foreach($services as $service)
                                                                    <option value="{{ $service->id }}"
                                                                            {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                                        {{ $service->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('service_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="employee_id">Funcionário Responsável*</label>
                                                            <select class="form-control @error('employee_id') is-invalid
                                                            @enderror" id="employee_id" name="employee_id">
                                                                <option value="">Selecione o proprietário</option>
                                                                @foreach($employees as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                            {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                                                        {{ $employee->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('employee_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="schedule_date">Data do Agendamento*</label>
                                                            <input type="date" class="form-control @error('schedule_date')
                                                            is-invalid @enderror" id="schedule_date" name="schedule_date"
                                                                   value="{{old('schedule_date')}}">
                                                            @error('schedule_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        @include('_includes.schedule-list')
                                                    </div>

                                                    <div class="col-12 col-md-12">
                                                        <div class="form-group">
                                                            <label for="observations">Observações</label>
                                                            <textarea class="form-control @error('observations')
                                                             is-invalid @enderror" id="observations" name="observations"
                                                                      placeholder="Ex: Observações sobre o agendamento"
                                                                      rows="2">{{old('observations')}}
                                                            </textarea>
                                                            @error('observations')
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
                            <i class="fa-solid fa-check"></i> Finalizar Agendamento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/appointments/appointments.js')}}"></script>
    <script src="{{asset('js/scripts/pages/appointments/unavailable-times.js')}}"></script>
@endsection

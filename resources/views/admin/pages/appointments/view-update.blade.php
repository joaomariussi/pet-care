@extends('admin.layouts.menusLayout')

@section('title', 'Editar Agendamento')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/appointments/create.css') }}">
@endsection

@section('vendor-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/editors/quill/quill.bubble.css') }}">
@endsection

@section('content')
    <section class="edit-positions">
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
                                    <li class="breadcrumb-item active">Editar Agendamento</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </section>

                <b class="title-geral-etapas">Editar Agendamento #{{$appointment->id}}</b>
                <p>Atualize as informações do agendamento no formulário abaixo.</p>

                <form method="POST" action="{{route('appointments.update', $appointment->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-button erroInfoGerais
                                    {{form_collapse_errors($errors, ['pet_id','owner_id', 'service_id', 'employee_id',
                                    'schedule_date', 'schedule_time','status', 'observations'])}}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#informacoesGerais-collapse"
                                            aria-expanded="true" aria-controls="informacoesGerais-collapse">
                                        <i class="fa-solid fa-circle-info font-medium-5"></i>
                                        <span class="ms-2">Informações do Agendamento</span>
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
                                                                @foreach($pets as $pet)
                                                                    <option value="{{ $pet->id }}"
                                                                            data-owner="{{ $pet->owner ? $pet->owner->name : 'Sem proprietário' }}"
                                                                            {{ $appointment->pet_id == $pet->id ? 'selected' : '' }}>
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
                                                            <input type="text" class="form-control" id="owner_id"
                                                                   name="owner_id"
                                                                   value="{{ $appointment->pet->owner->name ?? 'Sem proprietário' }}"
                                                                   disabled>
                                                            <input type="hidden" name="owner_id" id="owner_id"
                                                                   value="{{ $appointment->pet->owner_id }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="service_id">Serviço*</label>
                                                            <select class="form-control @error('service_id')
                                                             is-invalid @enderror" id="service_id" name="service_id">
                                                                @foreach($services as $service)
                                                                    <option value="{{ $service->id }}"
                                                                            {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
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
                                                            <select class="form-control @error('employee_id')
                                                            is-invalid @enderror" id="employee_id" name="employee_id">
                                                                @foreach($employees as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                            {{ $appointment->employee_id == $employee->id ? 'selected' : '' }}>
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
                                                            is-invalid @enderror" id="schedule_date"
                                                                   name="schedule_date"
                                                                   value="{{ $appointment->schedule_date }}">
                                                            @error('schedule_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        @include('_includes.schedule-list', ['selected' => $appointment->schedule_time])
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="status">Status do Agendamento</label>
                                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                                <option value="Em Andamento" {{ $appointment->status == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                                                                <option value="Confirmado" {{ $appointment->status == 'Confirmado' ? 'selected' : '' }}>Confirmado</option>
                                                                <option value="Concluído" {{ $appointment->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                                                                <option value="Cancelado" {{ $appointment->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                                            </select>
                                                            @error('status')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="observations">Observações</label>
                                                            <textarea class="form-control @error('observations') is-invalid
                                                            @enderror" id="observations" name="observations"
                                                                      rows="1">{{ $appointment->observations }}</textarea>
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
                            <i class="fa-solid fa-check"></i> Atualizar Agendamento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('js/scripts/pages/appointments/appointments.js') }}"></script>
    <script src="{{ asset('js/scripts/pages/appointments/unavailable-times.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const petSelect = document.getElementById('pet_id');
            const ownerNameInput = document.getElementById('owner_id');

            petSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const ownerID = selectedOption.getAttribute('data-owner');
                ownerNameInput.value = ownerID;
            });
        });
    </script>
@endsection

@php use Carbon\Carbon; @endphp
@extends('admin.layouts.menusLayout')

@section('title', 'Detalhes do Agendamento')

@section('content')
    <section class="appointment-details">
        <div class="row">
            <b class="title-geral-etapas">
                <i class="fa-solid fa-calendar-check me-2"></i> Detalhes do Agendamento #{{ $appointment->id }}
                <p>Visualize os detalhes do agendamento e edite o status se necessário.</p>
            </b>
            <div class="col-12 col-xl-12">
                <div class="card shadow-lg border-0 mb-4">
                    <div class="card-body p-4 bg-light">
                        <div class="row g-4">
                            <!-- Card para o Pet -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-paw me-2"></i>Pet</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->pet->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para o Proprietário -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-user me-2"></i>Proprietário</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->owner->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para o Serviço -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-briefcase-medical me-2"></i>Serviço</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->service->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para o Funcionário Responsável -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-user-md me-2"></i>Funcionário Responsável</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->employee->name }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para a Data do Agendamento -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-calendar-day me-2"></i>Data do Agendamento</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ Carbon::parse($appointment->schedule_date)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para o Horário do Agendamento -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-clock me-2"></i>Horário do Agendamento</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->schedule_time }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para o Status -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-info-circle me-2"></i>Status do Agendamento</h5>
                                        <p class="card-text fs-5 fw-semibold">{{ $appointment->status }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card para Observações -->
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body bg-white">
                                        <h5 class="card-title" style="color: #6364e4;"><i class="fa-solid fa-comment me-2"></i>Observações</h5>
                                        <p class="card-text fs-5">{{ $appointment->observations ? $appointment->observations : 'Nenhuma observação' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Exibe o botão de acordo com o status -->
                        <div class="mt-4 text-center">
                            @if($appointment->status == 'Em Andamento')
                                <!-- Botão para editar todos os dados do agendamento -->
                                <a href="{{ route('appointments.view-update', $appointment->id) }}"
                                   class="btn btn-outline-primary me-sm-0 me-lg-3 mb-sm-3 mb-lg-0 mb-md-0 me-md-3 mt-3 mt-md-0">
                                    <i class="fa-solid fa-pencil me-2"></i>Editar Agendamento
                                </a>
                            @else
                                <!-- Botão para editar apenas o status -->
                                <button type="button"
                                        class="btn btn-outline-primary me-sm-0 me-lg-3 mb-sm-3 mb-lg-0 mb-md-0 me-md-3 mt-3 mt-md-0"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editStatusModal">
                                    <i class="fa-solid fa-edit me-2"></i>Editar Status
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal para edição do status (para status Confirmado ou outro) -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('appointments.update-status', $appointment->id) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Status do Agendamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status">Selecione o Novo Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Em Andamento" {{ $appointment->status == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                                <option value="Confirmado" {{ $appointment->status == 'Confirmado' ? 'selected' : '' }}>Confirmado</option>
                                <option value="Cancelado" {{ $appointment->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                                <option value="Concluído" {{ $appointment->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/appointments/appointments.js')}}"></script>
@endsection

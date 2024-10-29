@php use Carbon\Carbon; @endphp
@extends('admin.layouts.menusLayout')

@section('title', 'Detalhes do Agendamento')

@section('content')
    <section class="appointment-details">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="text mb-3">
                        <i class="fa-solid fa-calendar-check me-2"></i> Detalhes do Agendamento #{{ $appointment->id }}
                    </h3>
                    <p class="text-muted">Visualize os detalhes do agendamento e edite o status se necessário.</p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- Card para o Pet -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-paw fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Pet</h5>
                                <p class="card-text">{{ $appointment->pet->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Proprietário -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-user fa-2x text-info"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Proprietário</h5>
                                <p class="card-text">{{ $appointment->owner->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Serviço -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-briefcase-medical fa-2x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Serviço</h5>
                                <p class="card-text">{{ $appointment->service->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Funcionário Responsável -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-user-md fa-2x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Funcionário Responsável</h5>
                                <p class="card-text">{{ $appointment->employee->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para a Data do Agendamento -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-calendar-day fa-2x text-danger"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Data do Agendamento</h5>
                                <p class="card-text">{{ Carbon::parse($appointment->schedule_date)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Horário do Agendamento -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-container me-3">
                                <i class="fa-solid fa-clock fa-2x text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Horário do Agendamento</h5>
                                <p class="card-text">{{ $appointment->schedule_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para o Status com cor e ícone -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            @php
                                $statusColor = match($appointment->status) {
                                    'Em Andamento' => 'text-warning',
                                    'Confirmado' => 'text-primary',
                                    'Concluído' => 'text-success',
                                    'Cancelado' => 'text-danger',
                                    default => 'text-secondary'
                                };
                                $statusIcon = match($appointment->status) {
                                    'Em Andamento' => 'fa-solid fa-spinner fa-spin',
                                    'Confirmado' => 'fa-solid fa-check-circle',
                                    'Concluído' => 'fa-sharp fa-regular fa-circle-check',
                                    'Cancelado' => 'fa-solid fa-ban',
                                    default => 'fa-solid fa-question-circle'
                                };
                            @endphp
                            <div class="icon-container me-3">
                                <i class="{{ $statusIcon }} fa-2x {{ $statusColor }}"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1">Status do Agendamento</h5>
                                <p class="card-text {{ $statusColor }}">{{ $appointment->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card para Observações -->
                <div class="col">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                <i class="fa-solid fa-comment me-2"></i>Observações
                            </h5>
                            <p class="card-text">{{ $appointment->observations ?? 'Nenhuma observação' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botão para editar o agendamento -->
            <div class="text-center mt-4">
                @if($appointment->status == 'Em Andamento')
                    <a href="{{ route('appointments.view-update', $appointment->id) }}"
                       class="btn btn-outline-primary">
                        <i class="fa-solid fa-pencil me-2"></i>Editar Agendamento
                    </a>
                @else
                    <!-- Botão de edição do status, desativado se o status for "Cancelado" -->
                    <button type="button"
                            class="btn btn-outline-primary {{ $appointment->status == 'Cancelado' ? 'disabled' : '' }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editStatusModal"
                            {{ $appointment->status == 'Cancelado' ? 'disabled' : '' }}>
                        <i class="fa-solid fa-edit me-2"></i>Editar Status
                    </button>
                @endif
            </div>
        </div>
    </section>

    <!-- Modal para edição do status -->
    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
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

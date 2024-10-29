@extends('admin.layouts.menusLayout')

@section('title', 'Página Inicial')

@section('page-styles')
    <style>
        .dashboard-section {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dashboard-section h5 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .dashboard-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            font-size: 1rem;
        }
        .dashboard-item i {
            font-size: 1.1rem;
            margin-right: 8px;
        }
        .icon-primary { color: #007bff; }
        .icon-success { color: #28a745; }
        .icon-warning { color: #ffc107; }
        .icon-danger { color: #dc3545; }
        .icon-info { color: #17a2b8; }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <section class="dashboard-admin">
        <div class="row g-3">
            <div class="col-12">
                <h3 class="greeting-text">Olá, {{ session('user.name') }}!</h3>
                <p class="mb-0">Bem-vindo(a) ao painel de gerenciamento do seu sistema.</p>
                <small>Atualizado {{ now()->format('d/m/Y H:i:s') }}</small>
            </div>

            <!-- Seção de Agendamentos -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="dashboard-section">
                    <h5><i class="fas fa-calendar-check icon-primary"></i> Agendamentos</h5>
                    <div class="dashboard-item">
                        <i class="fas fa-list-alt icon-info"></i>
                        <span>Total de Agendamentos:</span>
                        <span>{{ $totalAppointments }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-clock icon-primary"></i>
                        <span>Em Andamento:</span>
                        <span>{{ $appointmentsInProgress }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-check-circle icon-success"></i>
                        <span>Confirmados:</span>
                        <span>{{ $appointmentsConfirmed }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-ban icon-danger"></i>
                        <span>Cancelados:</span>
                        <span>{{ $appointmentsCanceled }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-flag-checkered icon-success"></i>
                        <span>Concluídos:</span>
                        <span>{{ $appointmentsCompleted }}</span>
                    </div>
                </div>
            </div>

            <!-- Seção de Funcionários -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="dashboard-section">
                    <h5><i class="fas fa-users icon-primary"></i> Funcionários</h5>
                    <div class="dashboard-item">
                        <i class="fas fa-user-tie icon-info"></i>
                        <span>Total de Funcionários:</span>
                        <span>{{ $totalEmployees }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-user-plus icon-success"></i>
                        <span>Novos este mês:</span>
                        <span>{{ $newEmployeesThisMonth }}</span>
                    </div>
                </div>
            </div>

            <!-- Seção de Pets -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="dashboard-section">
                    <h5><i class="fas fa-paw icon-primary"></i> Pets</h5>
                    <div class="dashboard-item">
                        <i class="fas fa-dog icon-info"></i>
                        <span>Total de Pets:</span>
                        <span>{{ $totalPets }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-bone icon-success"></i>
                        <span>Novos este mês:</span>
                        <span>{{ $newPetsThisMonth }}</span>
                    </div>
                </div>
            </div>

            <!-- Seção de Proprietários -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="dashboard-section">
                    <h5><i class="fas fa-user icon-primary"></i> Proprietários</h5>
                    <div class="dashboard-item">
                        <i class="fas fa-address-card icon-info"></i>
                        <span>Total de Proprietários:</span>
                        <span>{{ $totalOwners }}</span>
                    </div>
                    <div class="dashboard-item">
                        <i class="fas fa-user-plus icon-success"></i>
                        <span>Novos este mês:</span>
                        <span>{{ $newOwnersThisMonth }}</span>
                    </div>
                </div>
            </div>

            <div class="card-content">
                <div class="card-body card-dashboard">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-scripts')
    <script src="{{ asset('plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
    {{$dataTable->scripts()}}
@endsection

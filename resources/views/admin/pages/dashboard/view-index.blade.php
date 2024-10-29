@extends('admin.layouts.menusLayout')

@section('title', 'Página Inicial')

@section('page-styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/admin/pages/dashboard/details.css') }}">
@endsection

@section('content')
    <section class="dashboard-admin">
        <div class="col-12 mb-4">
            <h3 class="greeting-text">Olá, {{ session('user.name') }}!</h3>
            <p class="mb-0">Bem-vindo(a) ao painel de gerenciamento do seu sistema.</p>
            <small>Atualizado {{ now()->format('d/m/Y H:i:s') }}</small>
        </div>

        <!-- Grid dos Cards -->
        <div class="dashboard-grid">
            <!-- Seção de Agendamentos -->
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

            <!-- Seção de Funcionários -->
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

            <!-- Seção de Pets -->
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

            <!-- Seção de Proprietários -->
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
    </section>
@endsection

@extends('admin.layouts.menusLayout')

@section('title', 'Página Inicial')

@section('page-styles')
@endsection

@section('content')
    <section class="dashboard-admin">
        <div class="row g-3">
            <div class="col-12 col-md-12 col-xl-12">
                <h3 class="greeting-text">Olá, {{session('user.name')}}!</h3>
                <p class="mb-0">Bem-vindo(a) ao painel de gerenciamento do seu site!</p>
            </div>
        </div>
    </section>
@endsection

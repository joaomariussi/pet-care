@extends('admin.layouts.menusLayout')

@section('title', 'Página Inicial')

@section('page-styles')
@endsection

@section('content')
    <section class="dashboard-admin">
        <div class="row g-3">
            <div class="col-12 col-md-12 col-xl-12">
                <h3 class="greeting-text">Olá, {{session('user.nome')}}!</h3>
                <p class="mb-0">Bem-vindo(a) ao painel de gerenciamento do seu site!</p>
            </div>

            @if(session('notification') && count(session('notification')) > 0)
                @php
                    // Converta a coleção para um array
                    $notificationsArray = session('notification')->toArray();

                    // Use array_filter para filtrar as notificações com read igual a 0
                    $filteredNotifications = array_filter($notificationsArray, function ($notification) {
                        return $notification['read'] == 0;
                    });
                @endphp

                @if(count($filteredNotifications) > 0)
                    <div class="col-12">
                        <div class="alert alert-dismissible alert-info" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <div class="alert-message d-flex">
                                <i class="fa-solid fa-info"></i>
                                Você tem novas mensagens não lidas! Acesse
                                <a class="nav-link nav-link-label cursor-pointer" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <b>
                                        <i class="fa-regular fa-bell m-1"></i>
                                    </b>
                                </a>para visualizá-las.
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>
@endsection

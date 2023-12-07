@extends('admin.layouts.menusLayout')

@section('title', 'Lista de Notificações')

@section('content')
    <section class="index-sectors">
        <section id="breadcrumb-divider">
            <div class="row">
                <div class="card-content">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-cadastros">
                            <li class="breadcrumb-item"><a href="/"><i
                                        class="fa-solid fa-house"></i></a>
                            </li>
                            <li class="breadcrumb-item">Notificações</li>
                            <li class="breadcrumb-item active">Lista</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-12 col-md-12 col-xl-12">
                <div class="card-content">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="contacts-tab" data-bs-toggle="tab" href="#contacts"
                               aria-controls="contacts" role="tab"
                               aria-selected="true">
                                <i class="fa-solid fa-bell"></i>
                                <span class="align-middle">Notificações</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mt-4">
                        <div class="tab-pane active" id="contacts" aria-labelledby="contacts" role="tabpanel">
                            <b class="title-geral-etapas-sub">Lista de notificações</b>
                            <p>
                                Aqui você pode visualizar as notificações que já foram lidas. Caso queria visualizar as
                                notificações ainda não lidas, utilize o botão <i class="fa-regular fa-bell"></i> na barra de navegação.
                            </p>


                            <div class="row">
                                @if(count($notificationsAll) > 0)
                                    @foreach($notificationsAll as $notificationAll)
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3 d-flex align-items-center">
                                                            <div class="avatar">
                                                                @if($notificationAll['type'] == 'contacts')
                                                                    <span class="avatar-initial rounded-circle bg-label-warning">
                                                                    <i class="fa-solid fa-address-book"></i>
                                                                </span>
                                                                @elseif($notificationAll['type'] == 'jobs')
                                                                    <span class="avatar-initial rounded-circle bg-label-success">
                                                                    <i class="fa-solid fa-file"></i>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-1">{{$notificationAll['message']}}</h6>
                                                            <p class="mb-0">
                                                                <a href="{{$notificationAll['link']}}">
                                                                    <span class="btn-link">Visualizar</span>
                                                                </a>
                                                            </p>

                                                            <div class="d-flex flex-column text-muted">
                                                                <span>
                                                                    Recebido em:
                                                                    {{\Carbon\Carbon::parse($notificationAll['created_at'])->format('d/m/Y H:i:s')}}
                                                                </span>
                                                            </div>

                                                            <span>
                                                                @if($notificationAll['read'] == 1)
                                                                    <i class="fa-solid fa-check color-green-geral"></i> Lida
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <span>Não encontramos notificações para serem exibidas.</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Notificações</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            @if(session('notification') && count(session('notification')) > 0)
                @foreach(session('notification') as $notifications)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3 d-flex align-items-center">
                                <div class="avatar">
                                    @if($notifications['type'] == 'contacts')
                                        <span class="avatar-initial rounded-circle bg-label-warning">
                                            <i class="fa-solid fa-address-book"></i>
                                        </span>
                                    @elseif($notifications['type'] == 'jobs')
                                        <span class="avatar-initial rounded-circle bg-label-success">
                                            <i class="fa-solid fa-file"></i>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{$notifications['message']}}</h6>
                                <p class="mb-0">
                                    <a class="visualizar-notificacao" href="{{$notifications['link']}}" data-notificacao="{{$notifications['id']}}">
                                        <span class="btn-link">Visualizar</span>
                                    </a>
                                </p>
                                <small class="text-muted">
                                    {{\Carbon\Carbon::parse($notifications['created_at'])->format('d/m/Y H:i:s')}}
                                </small>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="list-unstyled">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        Não encontramos nenhuma notificação!
                    </div>
                </li>
            @endif
        </ul>
    </div>

    <div class="view-all-notifications">
        <a href="{{route('all-notifications')}}" class="btn btn-block btn-notify">
            Ver histórico de notificações
        </a>
    </div>
</div>

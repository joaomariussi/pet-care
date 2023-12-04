
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu p-0
<?php if(isset($configData['navbarType'])): ?><?php echo e($configData['navbarClass']); ?> <?php endif; ?>"
     data-bgcolor="<?php if(isset($configData['navbarBgColor'])): ?><?php echo e($configData['navbarBgColor']); ?><?php endif; ?>">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse justify-content-between" id="navbar-mobile">
                <div class="me-auto float-start bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none me-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="fa-solid fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav lojaInfos">
                        <li class="nav navbar-nav">

{{--                            <div class="d-flex align-items-center custom-control custom-switch custom-switch-success custom-control-inline ms-1">--}}
{{--                                <i id="corIcon" class="fa-solid fa-arrow-up-right-from-square font-medium-3"></i>--}}
{{--                                <a href="{{session('rocky_admin.user.partner.external_link')}}" target="_blank" class="">--}}
{{--                                    <span class="loja-online irLoja">Link Externo</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                        </li>
                    </ul>
                </div>
                <div class="float-end bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav float-end navbarInfos">

                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                @if(session('countNotifications') > 0)
                                    <i class="fa-regular fa-bell fa-shake font-medium-5"></i>
                                    <span class="badge badge-pill badge-danger badge-up">
                                        {{session('countNotifications', 0)}}
                                    </span>
                                @else
                                    <i class="fa-regular fa-bell font-medium-5"></i>
                                    <span class="badge badge-pill badge-danger badge-up">
                                        {{session('countNotifications', 0)}}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-bs-toggle="dropdown">
                                <div class="user-nav d-sm-flex">
                                    <span class="user-name">
                                        @if(session('user.avatar'))
                                            <img src="data:image/jpeg;base64,{{session('user.avatar')}}" alt="avatar">
                                        @else
                                            <img src="{{asset('images/logo/avatar.webp')}}" alt="" class="rounded-circle" width="35" height="35">
                                        @endif
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="{{route('profile-user')}}">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    @if(session('user.avatar'))
                                                        <img src="data:image/jpeg;base64,{{session('user.avatar')}}" alt="" class="rounded-circle" width="35" height="35">
                                                    @else
                                                        <img src="{{asset('images/logo/avatar.webp')}}" alt="" class="rounded-circle" width="35" height="35">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block lh-1">{{session('user.name')}}</span>
                                                <small>{{session('user.type')}}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{route('profile-user')}}">
                                        <i class="fa-solid fa-user me-2"></i>
                                        <span class="align-middle">Meu Perfil</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                <li>
                                    <a class="dropdown-item" href="{{route('logout')}}">
                                        <i class="fa-solid fa-power-off me-2"></i>
                                        <span class="align-middle">Sair</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

@include('admin.notifications.offcanvas-notifications')

<?php /**PATH C:\Users\usuario\Desktop\Rocky_clone\rockyadmin-laravel\resources\views/panels/navbar.blade.php ENDPATH**/ ?>

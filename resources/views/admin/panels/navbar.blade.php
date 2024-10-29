
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
                </div>
                <div class="float-end bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav float-end navbarInfos">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-bs-toggle="dropdown">
                                <div class="user-nav d-sm-flex">
                                    <span class="user-name">
                                        @if(session('user.avatar'))
                                            <img src="data:image/jpeg;base64,{{session('user.avatar')}}" alt="avatar">
                                        @else
                                            <img src="{{asset('images/avatar.webp')}}" alt="" class="rounded-circle" width="35" height="35">
                                        @endif
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    @if(session('user.avatar'))
                                                        <img src="data:image/jpeg;base64,{{session('user.avatar')}}" alt="" class="rounded-circle" width="35" height="35">
                                                    @else
                                                        <img src="{{asset('images/avatar.webp')}}" alt="" class="rounded-circle" width="35" height="35">
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

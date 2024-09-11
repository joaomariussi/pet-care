{{-- vertical-menu --}}
@if($configData['mainLayoutType'] == 'menu')
    <div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @endif menu-accordion menu-shadow"
        data-scroll-to-active="true">
        <div class="navbar-header d-flex justify-content-between">
            <ul class="nav navbar-nav">
                <li class="nav-item me-auto brand-text">
                    <a class="navbar-brand">
                        <div id="corIcon" class="plano-loja">
                            <a href="{{route('dashboard')}}" title="Dashboard">
                                <img src="{{asset('images/logo.png')}}" alt="logo" class="logo">
                            </a>
                        </div>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav float-end">
                <li class="nav navbar-nav">
                    <a class="nav-link modern-nav-toggle" data-bs-toggle="collapse">
                        <i id="corIcon" class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                        <i id="corIcon" class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="lines">
                @if(!empty($menuData[0]) && isset($menuData[0]))
                    @foreach ($menuData[0]->menu as $menu)
                        @if(isset($menu->navheader))
                            <li class="navigation-header"><span>{{$menu->navheader}}</span></li>
                        @else
                            @can($menu->can)
                                <li class="nav-item {{ $menu->url === config('view.active_sidebar') ? 'active' : '' }}">
                                    <a href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
                                        @if(isset($menu->icon))
                                            <i class="{{$menu->icon}}"></i>
                                        @endif
                                        @if(isset($menu->name))
                                            <span class="menu-title">{{ __($menu->name)}}</span>
                                        @endif
                                    </a>
                                    @if(isset($menu->submenu))
                                        @include('panels.sidebar-submenu',['menu' => $menu->submenu])
                                    @endif
                                </li>
                            @endcan
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endif


{{-- vertical-menu-submenu --}}
@if($configData['mainLayoutType'] == 'menu')
    <ul class="menu-content">
        @if (isset($menu))
            @foreach ($menu as $submenu)
                @can($submenu->can)
                    <li {{ $submenu->url === config('view.active_sidebar') ? 'class=active' : '' }}>
                        <a href="@isset($submenu->url) {{asset($submenu->url)}} @endisset" @if(isset($submenu->newTab)){{"target=_blank"}}@endif>
                            <i class="fa-solid fa-circle" style="font-size: 0.4rem"></i>
                            <span class="menu-item">{{ __(' '.$submenu->name)}}</span>
                        </a>
                        @if(isset($submenu->submenu))
                            @include('admin.panels.sidebar-submenu',['menu'=>$submenu->submenu])
                        @endif
                    </li>
                @endcan
            @endforeach
        @endif
    </ul>
@endif

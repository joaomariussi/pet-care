<!DOCTYPE html>
<html class="no-js" lang="pt-BR">
    @include('site.includes.view-head')

    <body style="min-height: 100vh;" data-mobile-nav-style="classic">
        @yield('content')

        @include('site.notifications.notification')

        @yield('page-scripts')
    </body>
</html>

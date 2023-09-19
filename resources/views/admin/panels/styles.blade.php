    {{-- style blade file --}}
    <!-- BEGIN: Vendor CSS-->
    @yield('vendor-styles')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{mix('css/admin/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('css/admin/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('css/admin/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('css/admin/components.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{mix('css/admin/core/menu/menu-types/vertical-menu.css')}}">

    @yield('page-styles')
    <!-- END: Page CSS-->

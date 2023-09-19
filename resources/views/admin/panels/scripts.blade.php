 <!-- BEGIN: Vendor JS-->
    <script>
        let assetBaseUrl = "{{ asset('') }}";
    </script>

    <script src="{{asset('js/core/libraries/jquery/jquery.js')}}"></script>
    <script src="{{asset('js/core/libraries/popper/popper.js')}}"></script>
    <script src="{{asset('js/core/libraries/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('js/core/libraries/unison/unison.js')}}"></script>

    <!-- BEGIN: Page Vendor JS-->
    @yield('vendor-scripts')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('js/core/app-menu.js')}}"></script>
    <script src="{{asset('js/core/app.js')}}"></script>
    <script src="{{asset('js/scripts/components.js')}}"></script>
    <script src="{{asset('js/scripts/footer.js')}}"></script>
    <script src="{{asset('js/scripts/customizer.js')}}"></script>
    <script src="{{asset('js/core/libraries/jquery-mask-plugin/jquery-mask.js')}}"></script>
    <script src="{{asset('js/scripts/extensions/masks.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page Notification-->
    @include('admin.notifications.notification')
    <!-- END: Page Notification-->

    <!-- BEGIN: Page JS-->
    @yield('page-scripts')
    <!-- END: Page JS-->

 <!-- End Begin Vendor JS -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>


 <script src="{{asset('js/scripts/extensions/masks.js')}}"></script>

     <script>
         $(document).ready(function () {
             // Obtém o token CSRF do meta tag no layout
             let csrfToken = $('meta[name="csrf-token"]').attr('content');

             $('.visualizar-notificacao').on('click', function () {
                 let id = $(this).data('notificacao');
                 $.ajax({
                     url: '/contacts/notification-read/' + id,
                     type: 'PUT',
                     headers: {
                         'X-CSRF-TOKEN': csrfToken
                     },
                     dataType: 'json',
                     success: function (data) {
                         if (data === true) {
                            window.location.href = '/contacts/notification/' + id;
                         } else {
                            console.error('Erro ao marcar como lida');
                         }

                     },
                     error: function (xhr, status, error) {
                         console.error(xhr.responseText);
                     }
                 });
             });
         });
     </script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page Notification-->
    @include('admin.notifications.notification')
    <!-- END: Page Notification-->

    <!-- BEGIN: Page JS-->
    @yield('page-scripts')
    <!-- END: Page JS-->

 <!-- End Begin Vendor JS -->

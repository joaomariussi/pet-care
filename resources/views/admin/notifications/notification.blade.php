{{-- vendor styles --}}

<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/toastr.css')}}">
<script src="{{asset('vendors/js/extensions/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/core/libraries/jquery-confirm/jquery-confirm.js')}}"></script>


<script>
    {{-- success messages --}}
    @if(session()->has('success'))
    @foreach(session('success.messages') as $message)
    toastr.success("{{$message}}", "{{session('success.title')}}", {"progressBar": true, "closeButton": true});
    @endforeach
    @php
        session()->forget('success')
    @endphp
    @endif

    {{-- error messages --}}
    @if(session()->has('error'))
    @foreach(session('error.messages') as $message)
    toastr.error("{{$message}}", "{{session('error.title')}}", {"progressBar": true, "closeButton": true});
    @endforeach
    @php
        session()->forget('error')
    @endphp
    @endif

    {{-- warning messages --}}
    @if(session()->has('warning'))
    @foreach(session('warning.messages') as $message)
    toastr.warning("{{$message}}", "{{session('warning.title')}}", {"progressBar": true, "closeButton": true});
    @endforeach
    @php
        session()->forget('warning')
    @endphp
    @endif

    {{-- info messages --}}
    @if(session()->has('info'))
    @foreach(session('info.messages') as $message)
    toastr.info("{{$message}}", "{{session('info.title')}}", {"progressBar": true, "closeButton": true});

    @endforeach
    @php
        session()->forget('info')
    @endphp
    @endif

    /**
     * Comfirmar exclusão
     *
     * @param url
     * @param title
     * @param message
     */
    function confirmDeletion(url, title = 'Excluir!', message = 'Tem certeza que deseja excluir este registro?') {
        $.confirm({
            icon: 'fa fa-warning',
            type: 'red',
            typeAnimated: true,
            title: title,
            content: message,
            buttons: {
                somethingElse: {
                    text: 'Confirmar',
                    btnClass: 'btn-red',
                    keys: ['enter', 'shift'],
                    action: function () {
                        location.href = url
                    }
                },
                cancelar: function () {
                }
            }
        });
    }

    /**
     * Confirmar exclusão de checkbox
     * @param $element
     * @param $message
     */
    function checkboxConfirm($element, $message = 'Tem certeza que deseja realizar esta ação?') {
        if (!$element.is(':checked')) {
            $.confirm({
                icon: 'fa fa-warning',
                type: 'red',
                typeAnimated: true,
                title: 'Atenção!',
                content: $message,
                buttons: {
                    somethingElse: {
                        text: 'Confirmar',
                        btnClass: 'btn-red',
                        keys: ['enter', 'shift'],
                        action: function () {
                            $element.prop('checked', false)
                            $('#ribbon-tag-'+$element.val()).addClass('d-none');
                        }
                    },
                    cancelar: function () {
                        $element.prop('checked', true)
                        $('#ribbon-tag-'+$element.val()).removeClass('d-none');
                    }
                }
            });
        }
    }

</script>

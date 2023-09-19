<footer class="footer footer-light @if(isset($configData['footerType'])){{$configData['footerClass']}}@endif">
    <div class="row">
        <p class="clearfix mb-0 mt-2 p-0">
            <span class="float-start d-inline-block">
                {{\Carbon\Carbon::now()->year}} &copy; {{session('rocky_admin.user.partner.name')?'Plataforma ' . session('rocky_admin.user.partner.name'): 'Uniom Team' }}
            </span>
            @if($configData['isScrollTop'] === true)
                <button class="btn btn-primary btn-icon scroll-top" type="button">
                    <i class='bx bxs-chevrons-up' ></i>
                </button>
            @endif
        </p>
    </div>
</footer>

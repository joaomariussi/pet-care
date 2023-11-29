
<div class="btns-infos">
    <span class="outras-marcas" title="Ver Outras marcas" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="solid-icon-Tap"></i> <span class="d-mobile-none">Outras Marcas</span>
    </span>

    <a class="btn-home bg-transparent-gradient-gray-orange" href="{{route('site.index')}}" title="Voltar para cassul distribuidora">
        <i class="solid-icon-Home"></i> <span class="d-mobile-none">Voltar para Cassul</span>
    </a>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div class="d-flex flex-column">
            <span class="alt-font text-medium text-gradient-yellow text-uppercase font-weight-500 margin-15px-bottom d-inline-block">
                Nossas Marcas
            </span>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="portfolio-switch-image portfolio-wrapper grid grid-2col gutter-extra-large text-center">
            <li class="grid-sizer"></li>
            <li class="grid-item">
                <div class="portfolio-box">
                    <div class="portfolio-image border-radius-4px box-shadow-double-large">
                        <a href="{{route('casspet')}}" title="Casspet">
                            <img src="{{asset('images/logo-marcas/casspet-logo.webp')}}" alt="Logo Casspet" data-no-retina="" class="mCS_img_loaded">
                        </a>
                    </div>
                    <div class="portfolio-caption padding-15px-top">
                        <a href="{{route('casspet')}}" title="Casspet"
                           class="alt-font text-small text-extra-dark-gray text-extra-dark-gray-hover font-weight-500 d-inline-block">
                            Casspet
                        </a>
                    </div>
                </div>
            </li>

            <li class="grid-item">
                <div class="portfolio-box">
                    <div class="portfolio-image border-radius-4px box-shadow-double-large">
                        <a href="{{route('imbativel')}}" title="Imbativel">
                            <img src="{{asset('images/logo-marcas/imbativel.webp')}}" alt="Logo Imbativel" data-no-retina="" class="mCS_img_loaded">
                        </a>
                    </div>
                    <div class="portfolio-caption padding-15px-top">
                        <a href="{{route('imbativel')}}" title="Imbativel"
                           class="alt-font text-small text-extra-dark-gray text-extra-dark-gray-hover font-weight-500 d-inline-block">
                            Imbatível
                        </a>
                    </div>
                </div>
            </li>

            <li class="grid-item">
                <div class="portfolio-box">
                    <div class="portfolio-image border-radius-4px box-shadow-double-large">
                        <a href="{{route('lactomais')}}" title="Lacto Mais">
                            <img src="{{asset('images/logo-marcas/Lacto-Mais.webp')}}" alt="Logo Lacto-Mais" data-no-retina="" class="mCS_img_loaded">
                        </a>
                    </div>
                    <div class="portfolio-caption padding-15px-top">
                        <a href="{{route('lactomais')}}" title="Lacto Mais"
                           class="alt-font text-small text-extra-dark-gray text-extra-dark-gray-hover font-weight-500 d-inline-block">
                            Lacto-Mais
                        </a>
                    </div>
                </div>
            </li>

            <li class="grid-item">
                <div class="portfolio-box">
                    <div class="portfolio-image border-radius-4px box-shadow-double-large">
                        <a href="{{route('thorxx')}}" title="Thorxx">
                            <img src="{{asset('images/logo-marcas/thorxx.webp')}}" alt="Logo Thorxx" data-no-retina="" class="mCS_img_loaded">
                        </a>
                    </div>
                    <div class="portfolio-caption padding-15px-top">
                        <a href="{{route('thorxx')}}" title="Thorxx"
                           class="alt-font text-small text-extra-dark-gray text-extra-dark-gray-hover font-weight-500 d-inline-block">
                            Thorxx
                        </a>
                    </div>
                </div>
            </li>

            <li class="grid-item">
                <div class="portfolio-box">
                    <div class="portfolio-image border-radius-4px box-shadow-double-large">
                        <a href="{{route('sellenza')}}" title="Sellenza Sementes">
                            <img src="{{asset('images/logo-marcas/sellenza.webp')}}" alt="Logo Sementes" data-no-retina="" class="mCS_img_loaded">
                        </a>
                    </div>
                    <div class="portfolio-caption padding-15px-top">
                        <a href="{{route('sellenza')}}" title="Sellenza"
                           class="alt-font text-small text-extra-dark-gray text-extra-dark-gray-hover font-weight-500 d-inline-block">
                            Sellenza
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

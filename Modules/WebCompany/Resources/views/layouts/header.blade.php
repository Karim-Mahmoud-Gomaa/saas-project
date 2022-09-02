
<!--header start-->
<header class="main-header {{(Route::currentRouteName()=='home')?'position-absolute':''}} w-100" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <nav class="navbar navbar-expand-xl navbar-{{(Route::currentRouteName()=='home')?'dark':'light'}} sticky-header">
        <div class="container d-flex align-items-center justify-content-lg-between position-relative">
            <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                <img src="{{asset('assets/web/img/logo-white.png')}}" alt="logo" class="img-fluid logo-white mb-4 mt-3" />
                <img src="{{asset('assets/web/img/logo-color.png')}}" alt="logo" class="img-fluid logo-color mb-4 mt-3" />
            </a>
            
            <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop" role="button">
                <span
                class="far fa-bars"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBackdrop"
                aria-controls="offcanvasWithBackdrop"
                ></span>
            </a>
            <div class="clearfix"></div>
            <div class="collapse navbar-collapse justify-content-center">
                @include('webcompany::layouts.menu')
            </div>
            
            @if (!Auth::check())
            <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block">
                <a href="{{ LaravelLocalization::localizeUrl('/login') }}" class="btn btn-link text-decoration-none me-2 ar-font">@lang('webcompany::header.sign_in')</a>
                <a href="{{ LaravelLocalization::localizeUrl('/register') }}" class="btn btn-primary ar-font">@lang('webcompany::header.get_started')</a>                
            </div>
            @endif
            
            <!--offcanvas menu start-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="{{asset('assets/web/img/logo-color.png')}}" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="far fa-close"></i>
                    </button>
                </div>
                <div class="offcanvas-body">
                    @include('webcompany::layouts.menu')
                    @if (!Auth::check())
                    <div class="action-btns mt-4 ps-3">
                        <a href="{{ LaravelLocalization::localizeUrl('/login') }}" class="btn btn-outline-primary me-2 ar-font">@lang('webcompany::header.sign_in')</a>
                        <a href="{{ LaravelLocalization::localizeUrl('/register') }}" class="btn btn-primary ar-font">@lang('webcompany::header.get_started')</a>
                    </div>
                    @endif
                </div>
            </div>
            <!--offcanvas menu end-->
        </div>
    </nav>
</header>
{{-- 
    --}}
    <!--header end-->
    
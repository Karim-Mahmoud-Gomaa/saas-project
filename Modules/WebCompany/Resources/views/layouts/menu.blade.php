<ul class="nav col-12 col-md-auto justify-content-center main-menu">
    
    {{-- Home --}}
    @if (Route::currentRouteName()=='home')
    <li><a href="javascript:;" class="nav-link text-primary ar-font">{{$data[5]}}</a></li>
    @else
    <li><a href="{{ LaravelLocalization::localizeUrl('/') }}" class="nav-link ar-font">{{$data[5]}}</a></li>
    @endif
    {{-- services --}}
    @if (Route::currentRouteName()=='services')
    <li><a href="javascript:;" class="nav-link text-primary ar-font">{{$data[6]}}</a></li>
    @else
    <li><a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="nav-link ar-font">{{$data[6]}}</a></li>
    @endif
    {{-- About Us --}}
    @if (Route::currentRouteName()=='about_us')
    <li><a href="javascript:;" class="nav-link text-primary ar-font">{{$data[26]}}</a></li>
    @else
    <li><a href="{{ LaravelLocalization::localizeUrl('/about_us') }}" class="nav-link ar-font">{{$data[26]}}</a></li>
    @endif
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ar-font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$data[8]}}</a>
        <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white">
            <div class="dropdown-grid rounded-custom">
                <div class="dropdown-grid-item">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-link">
                        <span class="me-2">
                            <img src="{{asset('assets/images/flags/'.$localeCode.'.png')}}" width="20">
                        </span>
                        <div class="drop-title ar-font">{{ $properties['native'] }}</div>
                    </a>
                    @endforeach
                </div>
                
            </div>
        </div>
    </li>
    @if (Auth::check())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ar-font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Str::upper(auth()->user()->name)}}</a>
        <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white">
            <div class="dropdown-grid rounded-custom">
                <div class="dropdown-grid-item" style="white-space: nowrap;">
                    <a rel="alternate" href="{{ LaravelLocalization::localizeUrl('/profile') }}" class="dropdown-link">
                        <span class="me-2"><i class="fa-regular fa-address-book"></i></span>
                        <div class="drop-title ar-font">{{$data[38]}}</div>
                    </a>
                    <a rel="alternate" href="javascrept:;" class="dropdown-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="me-2"><i class="fa-solid fa-door-open"></i></span>
                        <div class="drop-title ar-font">{{$data[37]}}</div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </li>
    @endif
</ul>
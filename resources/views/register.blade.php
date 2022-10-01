@extends('layouts.app')

@section('header') <span></span> @endsection
@section('footer') <span></span> @endsection
@section('title') @lang('log.signup.page_title') @endsection

@section('css')

<style>

    .password-meter-wrap {
        margin-top: 5px;
        height: 16px;
        background-color: #ddd;
        height: 0.3em;
        width: 100%;
    }

    .password-meter-bar {
        width: 0;
        height: 100%;
        transition: width 400ms ease-in;
    }

    .password-meter-bar.level0 {
        width: 20%;
        background-color: #d00;
    }
    .password-meter-bar.level1 {
        width: 40%;
        background-color: #f50;
    }
    .password-meter-bar.level2 {
        width: 60%;
        background-color: #ff0;
    }
    .password-meter-bar.level3 {
        width: 80%;
        background-color: rgb(161, 168, 65);
    }

    .password-meter-bar.level4 {
        width: 100%;
        background-color: #393;
    }

</style>

@endsection

@section('content')
<script src="https://gabrieleromanato.dev/demo/javascript-password-meter-zxcbn/js/zxcvbn.js"></script>
@php
$lang=LaravelLocalization::getCurrentLocale();
@endphp
<!--register section start-->
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat right bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="pricing-content-wrap bg-custom-light rounded-custom shadow-lg">
                    <div class="price-feature-col pricing-feature-info text-white left-radius p-5 order-1 order-lg-0">
                        <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="mb-5 d-none d-xl-block d-lg-block"><img src="{{asset('')}}assets/web/img/logo-white.png" alt="logo" class="img-fluid"></a>
                        <div class="customer-testimonial-wrap mt-60">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="testimonial-tab-1" role="tabpanel">
                                    <div class="testimonial-tab-content mb-4">
                                        <div class="mb-2">
                                            <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </div>
                                        <blockquote>
                                            <h5>@lang("web.review1")</h5>
                                        </blockquote>
                                        <div class="author-info mt-4">
                                            <h6 class="mb-0">Joe Richard</h6>
                                            <span>Visual Designer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="testimonial-tab-2" role="tabpanel">
                                    <div class="testimonial-tab-content mb-4">
                                        <div class="mb-2">
                                            <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </div>
                                        <blockquote>
                                            <h5>@lang("web.review2")</h5>
                                        </blockquote>
                                        <div class="author-info mt-4">
                                            <h6 class="mb-0">Oberoi R.</h6>
                                            <span class="small">CEO at Herbs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="testimonial-tab-3" role="tabpanel">
                                    <div class="testimonial-tab-content mb-4">
                                        <div class="mb-2">
                                            <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                                <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                            </ul>
                                        </div>
                                        <blockquote>
                                            <h5>@lang("web.review3")</h5>
                                        </blockquote>
                                        <div class="author-info mt-4">
                                            <h6 class="mb-0">Joan Dho</h6>
                                            <span class="small">Founder and CTO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav testimonial-tab-list mt-5" id="nav-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" href="#testimonial-tab-1" data-bs-toggle="tab" data-bs-target="#testimonial-tab-1" role="tab" aria-selected="true">
                                        <img src="{{asset('')}}assets/web/img/testimonial/1.jpg" class="img-fluid rounded-circle" width="60" alt="user">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#testimonial-tab-2" data-bs-toggle="tab" data-bs-target="#testimonial-tab-2" role="tab" aria-selected="false">
                                        <img src="{{asset('')}}assets/web/img/testimonial/2.jpg" class="img-fluid rounded-circle" width="60" alt="user">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#testimonial-tab-3" data-bs-toggle="tab" data-bs-target="#testimonial-tab-3" role="tab" aria-selected="false">
                                        <img src="{{asset('')}}assets/web/img/testimonial/3.jpg" class="img-fluid rounded-circle" width="60" alt="user">
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="row justify-content-center mt-60">
                            <div class="col-12">
                                <p>@lang("web.trusted_many_companies")</p>
                                <ul class="list-unstyled list-inline mb-0">
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-1.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-2.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-3.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-4.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-5.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                    <li class="list-inline-item">
                                        <img src="{{asset('')}}assets/web/img/clients/client-logo-6.svg" width="120" alt="clients logo" class="img-fluid py-3 me-3 customer-logo">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="price-feature-col pricing-action-info p-5 right-radius bg-light order-0 order-lg-1">
                        <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="mb-5 d-block d-xl-none d-lg-none"><img src="{{asset('')}}assets/web/img/logo-color.png" alt="logo" class="img-fluid"></a>
                        <h1 class="h3 ar-font rtl text-center">@lang('log.signup.title')</h1>
                        <p class="text-muted ar-font rtl text-center">@lang('log.signup.body')</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li style="color:#d93846;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{asset('register')}}" method="POST" class="mt-4 register-form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="name" class="mb-1 ar-font rtl }}">@lang('log.name') <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{__('log.name')}}" id="name" required aria-label="name">
                                    </div>
                                </div>
                                <div class="col-sm-6 ">
                                    <label for="email" class="mb-1 ar-font rtl}}">@lang('log.email') <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{__('log.email')}}" id="email" required aria-label="email">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="company" class="mb-1 ar-font rtl}}">@lang('log.company')</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" value="{{ old('company') }}" placeholder="{{__('log.company')}}" id="company" required aria-label="company">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="password" class="mb-1 ar-font rtl}}">@lang('log.password') <span
                                        class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="password"  onkeyup="score_password(this.value)" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{__('log.password')}}" id="password" required aria-label="Password">
                                        <div class="password-meter-wrap">
                                            <div class="password-meter-bar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="password" class="mb-1 ar-font rtl}}">@lang('log.password_confirmation') <span
                                        class="text-danger">*</span>
                                    </label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="{{__('log.password_confirmation')}}" id="password" required aria-label="Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check flex">
                                        <input class="form-check-input me-2" type="checkbox" name="terms" required id="flexCheckChecked">
                                        <label class="form-check-label ar-font rtl" for="flexCheckChecked">
                                            @lang('log.i_read')
                                            <a href="#" class="text-decoration-none">@lang('log.terms_conditions')</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-4 d-block w-100 ar-font text-center">@lang('log.signup.page_title')</button>
                                </div>
                            </div>
                            <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                                <span class="divider-bar"></span>
                                <h6 class="position-absolute text-center divider-text bg-light mb-0 ar-font">@lang('log.or')</h6>
                            </div>
                            <div class="action-btns">
                                <a href="#" class="btn google-btn mt-4 d-block bg-white shadow-sm d-flex align-items-center text-decoration-none justify-content-center">
                                    <img src="{{asset('assets/web/img/google-icon.svg')}}" alt="google" class="me-3">
                                    <span class="ar-font">@lang('log.google_log')</span>
                                </a>
                            </div>
                            <p class="text-center text-muted mt-4 mb-0 fw-medium font-monospace ar-font">
                                @lang('log.have_account')
                                <a href="{{ LaravelLocalization::localizeUrl('login') }}" class="text-decoration-none">@lang('log.login.page_title')</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--register section end-->

<script>
    function score_password(password){
        let bar = document.getElementsByClassName('password-meter-bar')[0];
        bar.classList.remove('level0', 'level1', 'level2', 'level3', 'level4');
        let cls = `level${zxcvbn(password).score}`;
        bar.classList.add(cls);
    }
    
</script>
@endsection

@extends('layouts.app')

@section('header') <span></span> @endsection
@section('footer') <span></span> @endsection
@section('title') @lang('log.login.page_title') @endsection

@section('content')
@php
$lang=LaravelLocalization::getCurrentLocale();
@endphp
<!--register section start-->
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('{{asset("assets/web/img/page-header-bg.svg")}}')no-repeat right bottom">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="mb-4 d-block text-center"><img src="{{asset('assets/web/img/logo-white.png')}}" alt="logo" class="img-fluid"></a>
                <div class="register-wrap p-5 bg-light shadow rounded-custom">
                    <h1 class="h3 ar-font rtl text-center">{{$page->content[27]}}</h1>
                    <p class="text-muted ar-font rtl text-center">{{$page->content[28]}}</p>
                    
                    <div class="action-btns">
                        <a href="#" class="btn google-btn bg-white shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                            <img src="{{asset('assets/web/img/google-icon.svg')}}" alt="google" class="me-3">
                            <span class="ar-font">{{__('web.connect_with_google')}}</span>
                        </a>
                    </div>
                    <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                        <span class="divider-bar"></span>
                        <h6 class="position-absolute text-center divider-text bg-light mb-0 ar-font">@lang('web.or')</h6>
                    </div>
                    <form action="{{asset('login')}}" method="POST" class="mt-4 register-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="email" class="mb-1 ar-font rtl float-{{($lang=='ar')?'end':'start'}}">{{__('web.email')}} <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="{{__('web.email')}}" name="email" value="user@test.com" required aria-label="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="password" class="mb-1 ar-font rtl float-{{($lang=='ar')?'end':'start'}}">{{__('web.password')}} <span
                                    class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="{{__('web.password')}}" name="password" value="password" required aria-label="Password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-3 d-block w-100 ar-font text-center">{{__('web.login')}}</button>
                                </div>
                            </div>
                            <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">
                                {{__('web.dont_have_an_account')}}
                                <a href="{{ LaravelLocalization::localizeUrl('register') }}" class="text-decoration-none ar-font">{{__('web.sign_up_today')}}</a>
                                <br>
                                <a href="{{ LaravelLocalization::localizeUrl('password_reset') }}" class="text-decoration-none ar-font">{{__('web.forgot_password')}}</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--register section end-->
    @endsection
    
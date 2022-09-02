@extends('layouts.app')

@section('header') <span></span> @endsection
@section('footer') <span></span> @endsection
@section('title') @lang('log.reset.page_title') @endsection

@section('content')
@php
$lang=LaravelLocalization::getCurrentLocale();
@endphp
<!--register section start-->
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('{{asset("assets/web/img/page-header-bg.svg")}}')no-repeat right bottom">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="mb-4 d-block text-center"><img src="{{asset("assets/web/img/logo-white.png")}}" alt="logo" class="img-fluid"></a>
                <div class="register-wrap p-5 bg-light shadow rounded-custom">
                    <h1 class="fw-bold h3 ar-font rtl text-center">@lang('log.reset.title')</h1>
                    <p class="text-muted ar-font rtl text-center">@lang('log.reset.body')</p>
                    
                    <form action="{{asset('webcompany/reset')}}" method="POST" class="mt-4 register-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="email" class="mb-1 ar-font rtl float-{{($lang=='ar')?'end':'start'}}">@lang('log.email') <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="{{__('log.reset.enter')}}" id="email" required aria-label="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3 d-block w-100 ar-font text-center">@lang('log.reset.page_title')</button>
                            </div>
                        </div>
                        <p class="font-monospace fw-medium text-center mt-3 pt-4 mb-0">
                            <a href="{{ LaravelLocalization::localizeUrl('login') }}" class="text-decoration-none ar-font">@lang('log.reset.back')</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--register section end-->
@endsection

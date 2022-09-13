@extends('layouts.app')

@section('header') <span></span> @endsection
@section('footer') <span></span> @endsection
@section('title') @lang('web.success_order_title') @endsection

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
                    <h1 class="fw-bold h3 ar-font rtl text-center">@lang('web.success_order_title')</h1>
                    <p class="text-muted ar-font rtl text-center">@lang('web.success_order_body')</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--register section end-->
@endsection

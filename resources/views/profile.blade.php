@extends('layouts.app')

@section('seo')
<title>@lang('web.your_profile')</title>
@endsection

@section('css')
<style>
    .shift-text{
        position: relative;
        left: 8%;
    }
</style>
@endsection
@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">@lang('web.your_profile')</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="our-integration ptb-120 bg-light">
    <div class="container">
        <div class="position-relative w-100">
            <div class="card rounded-custom mb-5">
                <div class="card-body p-5">
                    
                    <table class="table table-borderless m-0">
                        <tbody>
                            <tr>
                                <td><p class="h6 m-0">@lang('web.full_name')/ <span class="text-primary">{{auth()->user()->name}}</span></p> </td>
                                <td><p class="h6 m-0">@lang('web.email')/ <span class="text-primary">{{auth()->user()->email}}</span></p> </td>
                                <td><p class="h6 m-0">@lang('web.company')/ <span class="text-primary">{{auth()->user()->company?auth()->user()->company:'-----'}}</span></p> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="position-relative w-100">
            <div class="row">
            <div class="col-lg-4 col-md-6 p-2">
                    <a href="{{ LaravelLocalization::localizeUrl('/orders') }}" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-solid fa-receipt fa-3x"></i></div>
                            <h5>@lang('web.order_history')</h5>
                            <p class="mb-0 text-muted shift-text">
                                {{__('web.you_have',['num'=>$orders,'name'=>($orders>1)?__('web.orders'):__('web.order')])}}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 p-2">
                    <a href="javascript:;" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-solid fa-landmark fa-3x"></i></div>
                            <h5>@lang('web.your_balance')</h5>
                            <p class="mb-0 text-muted shift-text">{{$balance}}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 p-2">
                    <a href="{{ LaravelLocalization::localizeUrl('/renewals') }}" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-solid fa-arrows-rotate fa-3x"></i></div>
                            <h5>@lang('web.renewals')</h5>
                            <p class="mb-0 text-muted shift-text">
                                {{__('web.you_have',['num'=>$renewals,'name'=>($renewals>1)?'renewals':'renewal'])}}
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 p-2">
                    <a href="{{ LaravelLocalization::localizeUrl('/payment_methods') }}" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-regular fa-credit-card fa-3x"></i></div>
                            <h5>@lang('web.payment_methods')</h5>
                            <p class="mb-0 text-muted shift-text">
                                {{__('web.you_have',['num'=>$payments,'name'=>__('web.payment_methods')])}}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--style guide sections end-->

@endsection


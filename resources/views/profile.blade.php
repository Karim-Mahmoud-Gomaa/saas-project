@extends('layouts.app')

@section('seo')
<title>@lang('web.your_profile')</title>
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
                    
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><p class="h6">@lang('web.full_name')/ <span class="text-primary">{{auth()->user()->name}}</span></p> </td>
                                <td><p class="h6">@lang('web.email')/ <span class="text-primary">{{auth()->user()->email}}</span></p> </td>
                                <td><p class="h6">@lang('web.company')/ <span class="text-primary">{{auth()->user()->company?auth()->user()->company:'-----'}}</span></p> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="position-relative w-100">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <a href="{{ LaravelLocalization::localizeUrl('/orders') }}" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-solid fa-receipt fa-3x"></i></div>
                            <h5>@lang('web.order_history')</h5>
                            <p class="mb-0 text-muted">Globally engage tactical niche markets rather than client-based competently generate unique e-services</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="{{ LaravelLocalization::localizeUrl('/renewals') }}" class="position-relative text-decoration-none connected-app-single bg-white border border-2 bg-white mt-0 mt-lg-0 mt-md-0 transition-base rounded-custom d-block overflow-hidden p-5">
                        <div class="position-relative connected-app-content">
                            <div class="p-2"><i class="fa-solid fa-arrows-rotate fa-3x"></i></div>
                            <h5>@lang('web.renewals')</h5>
                            <p class="mb-0 text-muted">Globally engage tactical niche markets rather than client-based competently generate unique e-services</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--style guide sections end-->

@endsection


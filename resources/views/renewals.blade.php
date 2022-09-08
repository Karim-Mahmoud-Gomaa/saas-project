@extends('layouts.app')

@section('seo')
<title>@lang('web.renewals')</title>
@endsection

@section('css')
<style>
    .no-color-change,.no-color-change:hover{
        color: currentColor!important;
    }
</style>
@endsection

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">@lang('web.renewals')</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120">
    <div class="container">
        @if (count($products))
        
        <div class="row">
            <div class="col-12 pe-lg-5">
                <!--color start-->
                <div class="row">
                    <div class="col-12">
                        
                        @foreach ($products as $key=>$product)
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>
                                    <a href="{{ LaravelLocalization::localizeUrl('/products/'.$product->id) }}" class="no-color-change">
                                        #{{$key+1}} {{$product->package->service->name}} ({{$product->package->name}})
                                    </a>
                                    <span class="float-end {{$product->expired_at->subDays(7)<=now()?'text-danger':''}}">@lang('web.expired_at') : {{$product->expired_at->format('d/m/Y')}}</span>
                                </h4>
                                <p class="ms-3">
                                    {{number_format($product->package->price,2,'.',',')}} / @lang('web.month')
                                    @if ($product->expired_at->subDays(7)<=now())
                                    <a href="{{ LaravelLocalization::localizeUrl('/checkout/'.$product->package_id) }}" class="btn btn-info float-end">
                                        <i class="fa-solid fa-arrows-rotate"></i> @lang('web.renew') 
                                    </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!--color end-->
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <h2>@lang('web.empty_renewals')</h2>
                <a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="btn btn-info">@lang('web.go_shopping') <i class="fa-solid fa-cart-arrow-down"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    
    
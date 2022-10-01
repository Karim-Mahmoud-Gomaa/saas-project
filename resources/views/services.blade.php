@extends('layouts.app')

@section('seo')
<meta name="twitter:description" content="{{$page->description}}">
<meta name="keywords" content="{{$page->keywords}}">
<title>{{$page->name}}</title>
@endsection

@section("css")
<style>
.subscribed{
    font-weight: bold;
    color: #1778ff !important;
    margin-top: 1em;
}
</style>
@endsection

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">{{$page->content[1]}}</h1>
                <p class="lead">{{$page->content[2]}}</p>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--features grid section start-->
<section class="feature-section bg-light ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="feature-grid">
                    @foreach ($services as $service)
                    <div class="feature-card bg-white shadow-sm rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-primary-soft mb-32">
                            <i class="fal fa-analytics icon-sm text-primary"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">{{$service->name}}</h3>
                            <p class="mb-0">{!!nl2br($service->description)!!}</p>
                        </div>

                        @php
                            $subscribed=false;
                            $order_id=-1;
                            if(\Auth::user()){
                                $orders = \Auth::user()->orders()->get();
                                for($index=0;$index<count($orders);$index++){
                                    if($orders[$index]->details[0]->package->service->id==$service->id){
                                        $subscribed=true;
                                        $order_id=$orders[$index]->id;
                                    }
                                }
                            }
                        @endphp

                        @if($subscribed)
                            <a href="{{ LaravelLocalization::localizeUrl('/orders/'.$order_id) }}" class="link-with-icon text-decoration-none mt-3">
                                @lang('web.view_details')
                                <i class="far fa-arrow-right"></i>
                            </a>
                        @else
                            <a href="{{ LaravelLocalization::localizeUrl('/services/'.$service->slug) }}" class="link-with-icon text-decoration-none mt-3">
                                @lang('web.view_details')
                                <i class="far fa-arrow-right"></i>
                            </a>
                        @endif
                        
                        @if($subscribed)
                        <hr>
                        <p class="subscribed text-center">@lang('web.already_subscribed')</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--features grid section end-->

@endsection

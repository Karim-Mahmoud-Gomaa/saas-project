@extends('layouts.app')

@section('seo')
<meta name="twitter:description" content="{{$service->description}}">
<meta name="keywords" content="{{$service->keywords}}">
<title>{{$service->name}}</title>
@endsection


@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">{{$service->name}}</h1>
                <p class="lead">{{$service->description}}</p>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--pricing section start-->
<section class="pricing-section ptb-120 position-relative z-2">
    <div class="container">
        <div class="row">
            @foreach ($service->active_packages as $index=>$package)
            @php
            if($index%2){
                $card_class="bg-dark text-white p-5 mb-4 mb-lg-0";
                $text_class="text-warning";
                $btn_class="btn-primary";
            }else {
                $card_class="rounded-custom bg-white custom-shadow p-5 mb-4 mb-lg-0";
                $text_class="text-primary";
                $btn_class="btn-outline-primary";
            }
            $count=count($service->active_packages);
            $col=$count>=3?"col-lg-4 col-md-6":($count==2?"col-md-6":"col-md-12");
            @endphp
            
            <div class="{{$col}}">
                <div class="position-relative single-pricing-wrap rounded-custom p-5 mb-4 mb-lg-0 {{$card_class}}">
                    <div class="pricing-header mb-32">
                        <h3 class="package-name {{$text_class}} d-block">{{$package->name}}</h3>
                        @if ($package->price>0)
                        <h4 class="display-6 fw-semi-bold">${{number_format($package->price,($package->price%1?2:0),".",",")}}<span>/@lang('web.month')</span></h4>
                        @else
                        <h4 class="display-6 fw-semi-bold">@lang('web.free')</h4>
                        @endif
                    </div>
                    <div class="pricing-info mb-4">
                        <ul class="pricing-feature-list list-unstyled">
                            @foreach ($package->features as $feature)
                            <li><i class="fas fa-circle fa-2xs {{$text_class}} me-2"></i> {{$feature->description}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @if (Auth::check())
                    <a href="{{ LaravelLocalization::localizeUrl('/checkout/'.$package->id) }}" class="btn {{$btn_class}} mt-2">@lang('web.buy_now')</a>
                    @else
                    <a href="{{ LaravelLocalization::localizeUrl('/login') }}" class="btn {{$btn_class}} mt-2">@lang('web.buy_now')</a>
                    @endif
                </div> 
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<!--pricing section end-->

<!--faq section start-->
<section class="faq-section ptb-120 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12">
                <div class="section-heading text-center">
                    <h4 class="h5 text-primary">@lang('web.faq')</h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12">
                <div class="accordion faq-accordion" id="accordionExample">
                    @foreach ($service->faq as $index=>$faq)
                    <div class="accordion-item border border-2 {{$index==0?'active':''}}">
                        <h5 class="accordion-header" id="faq-{{$index+1}}">
                            <button class="accordion-button {{$index==0?'':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$index+1}}" aria-expanded="{{$index==0?'true':'false'}}">
                                {{$faq->question}} ?
                            </button>
                        </h5>
                        <div id="collapse-{{$index+1}}" class="accordion-collapse collapse {{$index==0?'show':''}}" aria-labelledby="faq-{{$index+1}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">{{$faq->answer}} .</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--faq section end-->
@endsection
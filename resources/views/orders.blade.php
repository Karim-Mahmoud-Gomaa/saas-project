@extends('layouts.app')

@section('seo')
<title>@lang('web.your_orders')</title>
@endsection

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12 col-md-12">
                <h1 class="display-5 fw-bold">@lang('web.your_orders')</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120">
    <div class="container">
        @if (count($orders))
        
        <div class="row">
            <div class="col-12 pe-lg-5">
                <!--color start-->
                <div class="row">
                    <div class="col-12">
                        @foreach ($orders as $order)
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>
                                    @lang('web.order_number') #{{$order->id*100}}
                                    <span class="float-end">@lang('web.total') ${{number_format($order->price,2,'.',',')}}</span>
                                </h4>
                                <p class="ms-3">
                                    @lang('web.created_at') : {{$order->created_at->format('d/m/Y')}}
                                    @if ($order->promo)
                                    <span class="float-end">@lang('web.promo') {{$order->promo->type=='rate'?'- %':'- $'}}{{number_format($order->promo->value,2,'.',',')}}</span>
                                    @endif
                                </p>
                                <hr>
                                <div class="row">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">@lang('web.service') (@lang('web.package'))</th>
                                                    <th scope="col">@lang('web.months')</th>
                                                    <th scope="col">@lang('web.discount')</th>
                                                    <th scope="col">@lang('web.total')</th>
                                                </tr>
                                            </thead>
                                            @foreach ($order->details as $key=>$detail)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$detail->package->service->name}} ({{$detail->package->name}})</td>
                                                <td>{{$detail->months}}</td>
                                                <td>% {{number_format($detail->discount,2,'.',',')}}</td>
                                                <td>{{number_format($detail->total,2,'.',',')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> 
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
                <h2>@lang('web.empty_orders')</h2>
                <a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="btn btn-info">@lang('web.go_shopping') <i class="fa-solid fa-cart-arrow-down"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    
    
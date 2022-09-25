@extends('layouts.app')

@section('seo')
<title>@lang('web.renewals')</title>
@endsection
@php
$logos['mastercard'] = '<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 482.51 374"> <title>mastercard</title> <g> <path d="M220.13,421.67V396.82c0-9.53-5.8-15.74-15.32-15.74-5,0-10.35,1.66-14.08,7-2.9-4.56-7-7-13.25-7a14.07,14.07,0,0,0-12,5.8v-5h-7.87v39.76h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78h7.87V398.89c0-7,4.14-10.35,9.94-10.35s9.11,3.73,9.11,10.35v22.78Zm129.22-39.35h-14.5v-12H327v12h-8.28v7H327V408c0,9.11,3.31,14.5,13.25,14.5A23.17,23.17,0,0,0,351,419.6l-2.49-7a13.63,13.63,0,0,1-7.46,2.07c-4.14,0-6.21-2.49-6.21-6.63V389h14.5v-6.63Zm73.72-1.24a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76h7.87V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-111.41,4.14c-4.14-2.9-9.94-4.14-16.15-4.14-9.94,0-16.15,4.56-16.15,12.43,0,6.63,4.56,10.35,13.25,11.6l4.14.41c4.56.83,7.46,2.49,7.46,4.56,0,2.9-3.31,5-9.53,5a21.84,21.84,0,0,1-13.25-4.14l-4.14,6.21c5.8,4.14,12.84,5,17,5,11.6,0,17.81-5.38,17.81-12.84,0-7-5-10.35-13.67-11.6l-4.14-.41c-3.73-.41-7-1.66-7-4.14,0-2.9,3.31-5,7.87-5,5,0,9.94,2.07,12.43,3.31Zm120.11,16.57c0,12,7.87,20.71,20.71,20.71,5.8,0,9.94-1.24,14.08-4.56l-4.14-6.21a16.74,16.74,0,0,1-10.35,3.73c-7,0-12.43-5.38-12.43-13.25S445,389,452.07,389a16.74,16.74,0,0,1,10.35,3.73l4.14-6.21c-4.14-3.31-8.28-4.56-14.08-4.56-12.43-.83-20.71,7.87-20.71,19.88h0Zm-55.5-20.71c-11.6,0-19.47,8.28-19.47,20.71s8.28,20.71,20.29,20.71a25.33,25.33,0,0,0,16.15-5.38l-4.14-5.8a19.79,19.79,0,0,1-11.6,4.14c-5.38,0-11.18-3.31-12-10.35h29.41v-3.31c0-12.43-7.46-20.71-18.64-20.71h0Zm-.41,7.46c5.8,0,9.94,3.73,10.35,9.94H364.68c1.24-5.8,5-9.94,11.18-9.94ZM268.59,401.79V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm306.08-20.71a12.39,12.39,0,0,0-10.77,5.8v-5h-7.87v39.76H532V399.31c0-6.63,3.31-10.77,8.7-10.77a24.24,24.24,0,0,1,5.38.83l2.49-7.46a28,28,0,0,0-5.8-.83Zm-30.65,20.71V381.91h-7.87v5c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25-7.87.41-12.43-5.8-12.43-13.25Zm111.83,0V366.17h-7.87v20.71c-2.9-3.73-7-5.8-12.84-5.8-11.18,0-19.47,8.7-19.47,20.71s8.28,20.71,19.47,20.71c5.8,0,9.94-2.07,12.84-5.8v5h7.87V401.79Zm-31.89,0c0-7.46,4.56-13.25,12.43-13.25,7.46,0,12,5.8,12,13.25,0,7.87-5,13.25-12,13.25C564.73,415.46,560.17,409.25,560.17,401.79Z" transform="translate(-132.74 -48.5)"/> <g> <rect x="169.81" y="31.89" width="143.72" height="234.42" fill="#ff5f00"/> <path d="M317.05,197.6A149.5,149.5,0,0,1,373.79,80.39a149.1,149.1,0,1,0,0,234.42A149.5,149.5,0,0,1,317.05,197.6Z" transform="translate(-132.74 -48.5)" fill="#eb001b"/> <path d="M615.26,197.6a148.95,148.95,0,0,1-241,117.21,149.43,149.43,0,0,0,0-234.42,148.95,148.95,0,0,1,241,117.21Z" transform="translate(-132.74 -48.5)" fill="#f79e1b"/> </g> </g></svg>';
$logos['visa'] = '<svg version="1.1" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 750 471" enable-background="new 0 0 750 471" xml:space="preserve"><title>Slice 1</title><desc>Created with Sketch.</desc><g id="visa" sketch:type="MSLayerGroup"><path id="Shape" sketch:type="MSShapeGroup" fill="#0E4595" d="M278.198,334.228l33.36-195.763h53.358l-33.384,195.763H278.198L278.198,334.228z"/><path id="path13" sketch:type="MSShapeGroup" fill="#0E4595" d="M524.307,142.687c-10.57-3.966-27.135-8.222-47.822-8.222c-52.725,0-89.863,26.551-90.18,64.604c-0.297,28.129,26.514,43.821,46.754,53.185c20.77,9.597,27.752,15.716,27.652,24.283c-0.133,13.123-16.586,19.116-31.924,19.116c-21.355,0-32.701-2.967-50.225-10.274l-6.877-3.112l-7.488,43.823c12.463,5.466,35.508,10.199,59.438,10.445c56.09,0,92.502-26.248,92.916-66.884c0.199-22.27-14.016-39.216-44.801-53.188c-18.65-9.056-30.072-15.099-29.951-24.269c0-8.137,9.668-16.838,30.559-16.838c17.447-0.271,30.088,3.534,39.936,7.5l4.781,2.259L524.307,142.687"/><path id="Path" sketch:type="MSShapeGroup" fill="#0E4595" d="M661.615,138.464h-41.23c-12.773,0-22.332,3.486-27.941,16.234l-79.244,179.402h56.031c0,0,9.16-24.121,11.232-29.418c6.123,0,60.555,0.084,68.336,0.084c1.596,6.854,6.492,29.334,6.492,29.334h49.512L661.615,138.464L661.615,138.464z M596.198,264.872c4.414-11.279,21.26-54.724,21.26-54.724c-0.314,0.521,4.381-11.334,7.074-18.684l3.607,16.878c0,0,10.217,46.729,12.352,56.527h-44.293V264.872L596.198,264.872z"/><path id="path16" sketch:type="MSShapeGroup" fill="#0E4595" d="M232.903,138.464L180.664,271.96l-5.565-27.129c-9.726-31.274-40.025-65.157-73.898-82.12l47.767,171.204l56.455-0.064l84.004-195.386L232.903,138.464"/><path id="path18" sketch:type="MSShapeGroup" fill="#F2AE14" d="M131.92,138.464H45.879l-0.682,4.073c66.939,16.204,111.232,55.363,129.618,102.415l-18.709-89.96C152.877,142.596,143.509,138.896,131.92,138.464"/></g></svg>';
$logos['diners'] = '<svg version="1.1" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 750 471" enable-background="new 0 0 750 471" xml:space="preserve"><title>diners</title><desc>Created with Sketch.</desc><g id="diners" sketch:type="MSLayerGroup"><path id="Shape-path" sketch:type="MSShapeGroup" fill="#0079BE" d="M584.934,236.947c0-99.416-82.98-168.133-173.896-168.1h-78.241c-92.003-0.033-167.73,68.705-167.73,168.1c0,90.931,75.729,165.641,167.73,165.203h78.241C501.951,402.587,584.934,327.857,584.934,236.947L584.934,236.947z"/><path id="Shape-path_1_" sketch:type="MSShapeGroup" fill="#FFFFFF" d="M333.281,82.932c-84.069,0.026-152.193,68.308-152.215,152.58c0.021,84.258,68.145,152.532,152.215,152.559c84.088-0.026,152.229-68.301,152.239-152.559C485.508,151.238,417.369,82.958,333.281,82.932L333.281,82.932z"/><path id="Path" sketch:type="MSShapeGroup" fill="#0079BE" d="M237.066,235.098c0.08-41.18,25.747-76.296,61.94-90.25v180.479C262.813,311.381,237.145,276.283,237.066,235.098z M368.066,325.373V144.848c36.208,13.921,61.915,49.057,61.981,90.256C429.981,276.316,404.274,311.426,368.066,325.373z"/></g></svg>';
$logos['discover'] = '<svg version="1.1" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 780 501" enable-background="new 0 0 780 501" xml:space="preserve"><title>discover</title><desc>Created with Sketch.</desc><g id="Page-1" sketch:type="MSPage"><g id="discover" sketch:type="MSLayerGroup"><path fill="#F47216" d="M409.412,197.758c30.938,0,56.02,23.58,56.02,52.709v0.033c0,29.129-25.082,52.742-56.02,52.742c-30.941,0-56.022-23.613-56.022-52.742v-0.033C353.39,221.338,378.471,197.758,409.412,197.758L409.412,197.758z"/><path d="M321.433,198.438c8.836,0,16.247,1.785,25.269,6.09v22.752c-8.544-7.863-15.955-11.154-25.757-11.154c-19.265,0-34.413,15.015-34.413,34.051c0,20.074,14.681,34.195,35.368,34.195c9.313,0,16.586-3.12,24.802-10.856v22.764c-9.343,4.141-16.912,5.775-25.757,5.775c-31.277,0-55.581-22.597-55.581-51.737C265.363,221.49,290.314,198.438,321.433,198.438L321.433,198.438z"/><path d="M224.32,199.064c11.546,0,22.109,3.721,30.942,10.994l-10.748,13.248c-5.351-5.646-10.411-8.027-16.563-8.027c-8.854,0-15.301,4.745-15.301,10.988c0,5.354,3.618,8.188,15.944,12.482c23.364,8.043,30.289,15.176,30.289,30.926c0,19.193-14.976,32.554-36.319,32.554c-15.631,0-26.993-5.795-36.457-18.871l13.268-12.031c4.73,8.609,12.622,13.223,22.42,13.223c9.163,0,15.947-5.951,15.947-13.984c0-4.164-2.056-7.733-6.158-10.258c-2.066-1.195-6.158-2.977-14.199-5.646c-19.292-6.538-25.91-13.527-25.91-27.186C191.474,211.25,205.688,199.064,224.32,199.064L224.32,199.064z"/><polygon points="459.043,200.793 481.479,200.793 509.563,267.385 538.01,200.793 560.276,200.793 514.783,302.479 503.729,302.479 "/><polygon points="157.83,200.945 178.371,200.945 178.371,300.088 157.83,300.088 "/><polygon points="569.563,200.945 627.815,200.945 627.815,217.744 590.09,217.744 590.09,239.75 626.426,239.75 626.426,256.541 590.09,256.541 590.09,283.303 627.815,283.303 627.815,300.088 569.563,300.088 "/><path d="M685.156,258.322c15.471-2.965,23.984-12.926,23.984-28.105c0-18.562-13.576-29.271-37.266-29.271H641.42v99.143h20.516V260.26h2.68l28.43,39.828h25.26L685.156,258.322z M667.938,246.586h-6.002v-30.025h6.326c12.791,0,19.744,5.049,19.744,14.697C688.008,241.224,681.055,246.586,667.938,246.586z"/><path d="M91.845,200.945H61.696v99.143h29.992c15.946,0,27.465-3.543,37.573-11.445c12.014-9.36,19.117-23.467,19.117-38.057C148.379,221.327,125.157,200.945,91.845,200.945z M115.842,275.424c-6.454,5.484-14.837,7.879-28.108,7.879H82.22v-65.559h5.513c13.271,0,21.323,2.238,28.108,8.018c7.104,5.956,11.377,15.183,11.377,24.682C127.219,259.957,122.945,269.468,115.842,275.424z"/></g></g></svg>';
@endphp
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/test.css')}}">
@endsection
@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">@lang('web.payment_methods')</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120" id="checkout-page">
    <div class="container">
        @if (count($payment_methods))
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content mt-100">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('web.select_payment')</h5>
                    </div>
                    <div class="modal-body" id="radio-container">
                        <form>
                            
                            <div class="form-group mb-4">
                                <label for="name">Name on Card</label>
                                <input type="text" class="form-control" v-model="ccName" />
                            </div>
                            
                            <div class="form-group">
                                <label for="card-number">Credit Card Number</label>
                                <span id="card-number" class="form-control stripe-element-container">
                                    <!-- Stripe Card Element -->
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="card-cvc">CVC Number</label>
                                <span id="card-cvc" class="form-control stripe-element-container">
                                    <!-- Stripe CVC Element -->
                                </span>
                            </div>
                            
                            <div class="form-group">
                                <label for="card-exp">Expiration</label>
                                <span id="card-exp" class="form-control stripe-element-container">
                                    <!-- Stripe Card Expiry Element -->
                                </span>
                            </div>
                            
                            {{-- <button @click.prevent="paymentSubmit" class="btn btn-primary mt-1 float-right">Submit Payment</button> --}}
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button @click="storePayment" type="submit" class="btn btn-primary" >Save</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row pb-5" style="min-height: 300px;">
            <div class="col-12 row">
                
                @foreach ($payment_methods as $key=>$payment)
                {{-- <div class="col-md-4" style="height: 17vw;">
                    <div class="card-container preload col-md-4">
                        <div class="creditcard">
                            <div class="front">
                                <div id="ccsingle"></div>
                                <svg version="1.1" id="cardfront" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 750 471" style="enable-background:new 0 0 750 471;" xml:space="preserve">
                                    <g id="Front">
                                        <g id="CardBackground">
                                            <g id="Page-1_1_">
                                                <g id="amex_1_">
                                                    <path id="Rectangle-1_1_" class="lightcolor grey" d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40
                                                    C0,17.9,17.9,0,40,0z" />
                                                </g>
                                            </g>
                                            <path class="darkcolor greydark" d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z" />
                                        </g>
                                        <text transform="matrix(1 0 0 1 60.106 295.0121)" id="svgnumber" class="st2 st3 st4">**** **** **** {{$payment->card->last4}}</text>
                                        <text transform="matrix(1 0 0 1 54.1064 428.1723)" id="svgname" class="st2 st5 st6">{{auth()->user()->name}}</text>
                                        <text transform="matrix(1 0 0 1 54.1074 389.8793)" class="st7 st5 st8">cardholder name</text>
                                        <text transform="matrix(1 0 0 1 479.7754 388.8793)" class="st7 st5 st8">expiration</text>
                                        <text transform="matrix(1 0 0 1 65.1054 241.5)" class="st7 st5 st8">card number</text>
                                        <g>
                                            <text transform="matrix(1 0 0 1 574.4219 433.8095)" id="svgexpire" class="st2 st5 st9"></text>
                                            <text transform="matrix(1 0 0 1 479.3848 417.0097)" class="st2 st10 st11">VALID</text>
                                            <text transform="matrix(1 0 0 1 479.3848 435.6762)" class="st2 st10 st11">THRU</text>
                                            <polygon class="st2" points="554.5,421 540.4,414.2 540.4,427.9 		" />
                                        </g>
                                        <g id="cchip">
                                            <g>
                                                <path class="st2" d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3
                                                c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z" />
                                            </g>
                                            <g>
                                                <g>
                                                    <rect x="82" y="70" class="st12" width="1.5" height="60" />
                                                </g>
                                                <g>
                                                    <rect x="167.4" y="70" class="st12" width="1.5" height="60" />
                                                </g>
                                                <g>
                                                    <path class="st12" d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3
                                                    c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3
                                                    C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5
                                                    c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5
                                                    c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" />
                                                </g>
                                                <g>
                                                    <rect x="82.8" y="82.1" class="st12" width="25.8" height="1.5" />
                                                </g>
                                                <g>
                                                    <rect x="82.8" y="117.9" class="st12" width="26.1" height="1.5" />
                                                </g>
                                                <g>
                                                    <rect x="142.4" y="82.1" class="st12" width="25.8" height="1.5" />
                                                </g>
                                                <g>
                                                    <rect x="142" y="117.9" class="st12" width="26.2" height="1.5" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4">
                    <div class="card rounded-custom">
                        <div class="card-body">
                            <h4 class="text-center">{{$payment->billing_details->name}}</h4>
                            <h6 class="text-secondary text-capitalize">{{$payment->card->brand}}</h6>
                            <p class="ms-3">
                                <p class="text-center"> 
                                    **** **** **** {{$payment->card->last4}}
                                </p>
                                <span class=""> 
                                    EXP : {{$payment->card->exp_month}}/{{substr($payment->card->exp_year,2)}}
                                </span>
                                <span class="float-end">
                                    <a href="#" class="btn btn-danger btn-sm" @click="deleteCard('{{$payment->id}}')">
                                        <i class="fa-solid fa-trash-can"></i> @lang('web.delete') 
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="card rounded-custom mt-4" @click="newPaymet" style="cursor: pointer;">
                        <div class="card-body p-5">
                            <h4>
                                Add New <i class="fa-solid fa-plus"></i>
                            </h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        @else
        <div class="row">
            <div class="col-12 text-center">
                <h2>@lang('web.empty_payment_methods')</h2>
                <a href="javascrept:;" class="btn btn-info">@lang('web.add_new_payment') <i class="fa-solid fa-plus"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    
    @section('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
    <script>
        let stripe;
        const { createApp } = Vue
        createApp({
            delimiters: ['{%', '%}'],
            data() {
                return {
                    errors:null,
                }
            },
            mounted: function() {
                const style = {
                    base: {
                        'fontSize': '16px',
                        'color': '#495057',
                        'fontFamily': 'apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
                    }
                };
                stripe = Stripe('pk_test_51LeyNHENbOgVwcDpmU9fhiz2MNRaCf3mKkgCvgvliDHnIWxDBbdhEkfipG8zP4Th6orsRubHmAUsFFj0Hze6HOLi00c8kxMR7j');
                const elements = stripe.elements();
                // Card number
                this.card = elements.create('cardNumber', {
                    'placeholder': 'cardNumber',
                    'style': style
                });
                this.card.mount('#card-number');
                
                // CVC
                this.cvc = elements.create('cardCvc', {
                    'placeholder': 'CVC',
                    'style': style
                });
                this.cvc.mount('#card-cvc');
                
                // Card expiry
                this.exp = elements.create('cardExpiry', {
                    'placeholder': 'MM/YY',
                    'style': style
                });
                this.exp.mount('#card-exp');
                
                
                // this.drowCardElements()
            },
            methods: {
                newPaymet() {
                    $('#exampleModal').modal('show')
                },
                async storePayment() {
                    if (this.ccName.length) {
                        let that=this
                        const { setupIntent, error } = await stripe.confirmCardSetup(
                        "{{ $intent->client_secret }}", {
                            payment_method: {
                                card: that.card,
                                billing_details: { name: that.ccName }
                            }
                        }
                        );
                        
                        if (error) {
                            console.log(error.message);
                        } else {
                            let route="{{ LaravelLocalization::localizeUrl('/payment_methods') }}";
                            axios.post(route,{payment_method:setupIntent.payment_method}).then(({ data }) => {
                                if (data.success) {location.reload();}
                            }).catch((error) => {
                                that.errors=error.response.data.errors
                            });
                        }
                    }
                    
                },
                deleteCard(id) {
                    Swal.fire({
                        title: "{!!__('web.r_u_sure')!!}",
                        text: "{!!__('web.wont_revert')!!}",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: "{!!__('web.delete_it')!!}"
                    }).then((result) => {
                        axios.delete('{{ LaravelLocalization::localizeUrl("payment_methods") }}/'+id).then(({ data }) => {
                            if (data.success) {
                                location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',title: 'Oops...',
                                    text: "{!!__('web.cant_delete')!!}",
                                })
                            }
                        })
                    })
                }
            }
        }).mount('#checkout-page')
    </script>
    
    @endsection
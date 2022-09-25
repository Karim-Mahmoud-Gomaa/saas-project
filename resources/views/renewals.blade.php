@extends('layouts.app')

@section('seo')
<title>@lang('web.renewals')</title>
@endsection

@section('css')
{{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
<style>
    .no-color-change,.no-color-change:hover{
        color: currentColor!important;
    }
    .swal2-radio {
        display: grid !important;
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('web.select_payment')</h5>
                    </div>
                    <div class="modal-body" id="radio-container"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 pe-lg-5">
                <!--color start-->
                <div class="row">
                    <div class="col-12">
                        
                        @foreach ($products as $key=>$product)
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5 pb-2">
                                <h4>
                                    <a href="{{ LaravelLocalization::localizeUrl('/products/'.$product->id) }}" class="no-color-change">
                                        #{{$key+1}} {{$product->package->service->name}} ({{$product->package->name}})
                                    </a>
                                    <span class="float-end {{$product->expired_at->subDays(7)<=now()?'text-danger':''}}">@lang('web.expired_at') : {{$product->expired_at->format('d/m/Y')}}</span>
                                </h4>
                                <p class="ms-3">
                                    <span class="">
                                        ({{$product->payment->billing_details->name}}) 
                                        {{$product->payment->card->brand}} : ***{{$product->payment->card->last4}} , EXP : {{$product->payment->card->exp_month}}/{{$product->payment->card->exp_year}}
                                        <i class="fa-regular fa-pen-to-square" onclick="editPayment({{$product->id}},'{{$product->payment_id}}')"></i>
                                    </span>
                                    <span class="float-end">
                                        {{number_format($product->package->price,2,'.',',')}} / @lang('web.month')
                                    </span>
                                </p>
                                @if ($product->expired_at->subDays(7)<=now())
                                <a href="{{ LaravelLocalization::localizeUrl('/checkout/'.$product->package_id) }}" class="btn btn-info float-end">
                                    <i class="fa-solid fa-arrows-rotate"></i> @lang('web.renew') 
                                </a>
                                @endif
                                <div class="form-check form-switch">
                                    <input class="form-check-input" onchange="changeRenewal({{$product->id}},this)" type="checkbox" id="flexSwitchCheckChecked{{$key}}" {{$product->is_active?'checked':''}}>
                                    <label class="form-check-label" for="flexSwitchCheckChecked{{$key}}"> @lang('web.auto_renew') </label>
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
                <h2>@lang('web.empty_renewals')</h2>
                <a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="btn btn-info">@lang('web.go_shopping') <i class="fa-solid fa-cart-arrow-down"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
    <script>
        function changeRenewal(id,checkboxElem) {
            axios.put('{{ LaravelLocalization::localizeUrl("products") }}/'+id,{is_active:checkboxElem.checked}).then(({ data }) => {
                location.reload();
            })
        }
        async function selectPayment(product_id,payment_id) {
            axios.put('{{ LaravelLocalization::localizeUrl("products") }}/'+product_id,{payment_id:payment_id}).then(({ data }) => {
                location.reload();
            })
        }
        async function editPayment(product_id,payment_id) {
            $('#radio-container').empty()
            axios.get('/all_payment_methods').then(({ data }) => {
                data.success.payment_methods.forEach((element,i) => {
                    $('#radio-container').append(
                        $('<div>').prop({class:'form-check'}).append(
                            "<input type='radio' class='form-check-input mt-2' name='myradio' "
                            +(payment_id==element.id?'':("onclick='selectPayment("+product_id+",\""+element.id+"\")'"))
                            +" id='email"+i+"' value="+element.id+" "+(payment_id==element.id?'checked':'') +"/>"
                        )
                        .append(
                            $('<label>').prop({for: 'email'+i,class:'form-check-label'}).html('('+element.billing_details.name+') '+element.card.brand+' : ***'+element.card.last4+' , EXP : '+element.card.exp_month+'/'+element.card.exp_year)
                        )
                    )
                });
                $('#exampleModal').modal('show')
                // console.log(data.success.payment_methods);
            })
        }
    </script>
    @endsection
@extends('layouts.app')

@section('seo')
<title>@lang('web.checkout')</title>
@endsection
@section('css')
<style>
    #promo-input{
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    input.promo-success{
        border: #59cc96 solid 1px !important;
        color: #59cc96 !important;
    }
    input.promo-danger{
        border: #e24e5d solid 1px !important;
        color: #e24e5d !important;
    }
    .new-method{
        display: flex;
        gap: 10px;
        margin: 1em;
    }
</style>
@endsection


@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">@lang('web.shopping_cart')</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120" id="checkout-page">
    <div class="container">
        @if (count($cart->details))
        
        <div class="row">
            <div class="col-lg-8 pe-lg-5">
                <!--color start-->
                <div class="row">
                    <div class="col-12">
                        <h2>@lang('web.cart_details')</h2>
                    </div>
                    
                    <div class="col-12">
                        <div class="card rounded-custom mb-5" v-for="(detail,index) in cart.details">
                            <div class="card-body p-5">
                                <h4>
                                    {% detail.package.name[lang] %} 
                                    <span class="float-end">{% moneyFormat(getPrice(detail)[0]) %}</span>
                                </h4>
                                <p class="ms-3">
                                    {% detail.package.service.name[lang] %} 
                                    <span v-if="getPrice(detail)[0]!=getPrice(detail)[1]" class="float-end text-decoration-line-through">{% moneyFormat(getPrice(detail)[1]) %}</span>
                                </p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Select Your Term Length</label>
                                            <select @change="changed($event,detail)" class="term-selector custom-select" :disabled="!detail.package.terms.length">
                                                <option v-for="(term,index2) in detail.package.terms" :selected="detail.months==term.months" :value="term.id">
                                                    {% getTermLengthName(term.months)%} 
                                                    {% term.pivot.discount>0?( '(%' + term.pivot.discount + ')' ) : '' %}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-control-label">Type Your Subdomain </label><b class="text-danger">*</b>
                                            <input class="form-control" v-model="path" type="text" placeholder="Ex: abc" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-danger float-end mt-4" :onclick="'event.preventDefault();document.getElementById(\'delete-form'+index+'\').submit();'">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <form :id="'delete-form'+index" :action="'/destroyPackage/'+detail.package.id" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete" />
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--color end-->
            </div>
            <div class="col-lg-4">
                <div class="sticky-sidebar rounded-custom">
                    <div class="row">
                        <div class="col-12">
                            <h2>@lang('web.order_summary')</h2>
                        </div>
                    </div>
                    <div v-show="page==1" class="card rounded-custom mb-5 summary">
                        <div class="card-body pt-5"  v-for="(detail,index) in cart.details">
                            <p class="h6"><i class="fa-regular fa-circle-dot"></i> {% detail.package.service.name[lang] %} ({% detail.package.name[lang] %})</p>
                            <p class="h6 ms-3 prices">
                                <span class="float-end">{% moneyFormat(getPrice(detail)[0]) %}</span> 
                                <span v-if="getPrice(detail)[0]!=getPrice(detail)[1]" class="float-end text-decoration-line-through text-black-50 me-2">{% moneyFormat(getPrice(detail)[1]) %}</span>
                            </p>
                        </div>
                        
                        <template v-if="getTotalPrice()>0">
                            <hr class="me-5 ms-5">
                            <div class="card-body pb-5">
                                <p class="h5">Subtotal</p>
                                <p class="h5 ms-3">
                                    <span class="float-end">{% moneyFormat(getSubTotalPrice()[0]) %}</span>
                                    <span v-if="getSubTotalPrice()[0]!=getSubTotalPrice()[1]" class="float-end text-decoration-line-through text-black-50 me-2">{% moneyFormat(getSubTotalPrice()[1]) %}</span>
                                </p>
                            </div>
                            <div class="card-body row pb-5">
                                <p class="h5">Discount
                                    <span class="float-end">{% (getPromo()[0])?moneyFormat(getPromo()[0]):'$0.00' %}</span>
                                    <span v-if="promo.type=='rate'&&promo.value>0" class="float-end text-black-50 me-2 h6">({% moneyFormat(getPromo()[1],2,'%') %})</span>
                                </p>
                                <div class="col-6">
                                    <input type="text" id="promo-input" :disabled="!promo.active" :class="'promo-'+(promo.errorText?'danger':(promo.value>0?'success':''))" class="form-control text-center" placeholder="Promo Code" v-model="promo.code">
                                    <p v-if="promo.errorText" class="text-danger text-center">{% promo.errorText %}</p>
                                </div>
                                <div class="col-6">
                                    {{-- <a href="javascript:;" class="btn btn-danger float-end mt-4"><i class="fa-regular fa-pen-to-square"></i></a> --}}
                                    <button v-if="promo.active" type="button" @click="savePromo()" class="btn btn-soft-success btn-icon"><i class="fa-regular fa-floppy-disk"></i></button>
                                    <button v-else type="button" @click="editPromo()" class="btn btn-soft-primary btn-icon"><i class="fa-regular fa-pen-to-square"></i></button>
                                    <button v-if="promo.value>0" type="button" @click="deletePromo()" class="btn btn-soft-danger btn-icon ms-1"><i class="fa-regular fa-circle-xmark"></i></button>
                                </div>
                            </div>
                        </template>
                        
                        <hr class="me-5 ms-5">
                        <div class="card-body pb-5">
                            <p class="h5">Total <span class="float-end">{% moneyFormat(getTotalPrice()) %}</span></p>
                            <p v-if="getSavedMoney()>0" class="text-black-50 text-center mb-0 mt-5">You saved <b>{% moneyFormat(getSavedMoney()) %}</b> on your order.</p>
                        </div>
                        <hr class="me-5 ms-5">
                        <div class="card-body text-center pb-5">
                            <button type="button" @click="changePage(2)" class="btn btn-primary">Submit Order <i class="fa-solid fa-right-long"></i> </button>
                        </div>
                    </div>
                    <div v-show="page==2" class="card rounded-custom mb-5 summary">
                        <div class="card-body pt-4">
                            <p class="h5">Total <span class="float-end">{% moneyFormat(getTotalPrice()) %}</span></p>
                        </div>
                        
                        <hr class="me-5 ms-5">
                        <div class="card-body">
                            <div class="row">
                                @if (count($payment_methods))
                                <div class="row">
                                    @foreach ($payment_methods as $key=>$payment_method)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" v-model="payment_method" name="payment_method" value="{{$payment_method->id}}" id="flexRadioDefault{{$key+1}}" {{$loop->first?'checked':''}}>
                                        <label class="form-check-label" for="flexRadioDefault{{$key+1}}">
                                            {{$payment_method->billing_details->name}} <br>
                                            {{$payment_method->card->brand}} ***{{$payment_method->card->last4}} 
                                        </label>
                                    </div>
                                    @endforeach
                                @else
                                <div class="row">
                                    <div class="form-check new-method">
                                        <input class="form-check-input" type="radio" v-model="payment_method" name="payment_method" value="" id="flexRadioDefault0" >
                                        <label class="form-check-label" for="flexRadioDefault0">
                                            New Payment Method
                                        </label>
                                    </div>    
                                </div>
                                @endif
                                
                                <form v-show="!payment_method">
                                    
                                    <div class="form-group mb-4">
                                        <label for="name">Name on Card</label>
                                        <input type="text" class="form-control" v-model="ccName" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="card-element">Credit Card</label>
                                        <div id="card-element" class="form-control"></div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                        
                        <hr class="me-5 ms-5">
                        <div class="card-body pb-3">
                            <template v-for="error_group in errors">
                                <template v-for="error in error_group">
                                    <div class="alert alert-danger" role="alert">{%error%}</div>
                                </template>
                            </template>    
                            <a href="javascript:;" @click="changePage(1)" class="btn btn-info"><i class="fa-solid fa-left-long"></i> Back</a>
                            <button id="pay-now" type="submit" @click="saveOrder()" class="btn btn-success float-end disabled">Pay Now <i class="fa-solid fa-money-check"></i></button>                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <h2>@lang('web.empty_cart')</h2>
                <a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="btn btn-info">@lang("web.go_shopping") <i class="fa-solid fa-cart-arrow-down"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    @section('js')
    @if (count($cart->details))
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script>
        let stripe;
        let elements;
        const { createApp } = Vue
        createApp({
            delimiters: ['{%', '%}'],
            data: function ()  {
                return {
                    cart: {!! json_encode($cart->toArray()) !!},
                    lang: "{{ LaravelLocalization::getCurrentLocale() }}",
                    free:"{{__('web.free')}}",
                    promo:{
                        active:false,
                        code:null,
                        type:'rate',
                        value:0,
                        errorText:null,
                    },
                    payment_method:"{{count($payment_methods)?$payment_methods[0]->id:''}}",
                    cardElement:null,
                    page:1,
                    errors:null,
                    ccName:"",
                    path: "",
                }
            },
            mounted: function() {
                
            },
            methods: {
                drowCardElements(){
                    const style = {
                        base: {
                            'fontSize': '16px',
                            'color': '#495057',
                            'fontFamily': 'apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
                        }
                    };
                    stripe = Stripe('pk_test_51LeyNHENbOgVwcDpmU9fhiz2MNRaCf3mKkgCvgvliDHnIWxDBbdhEkfipG8zP4Th6orsRubHmAUsFFj0Hze6HOLi00c8kxMR7j');
                    elements = stripe.elements();

                    // Card number
                    this.card = elements.create('card', {
                        'style': style
                    });
                    this.card.mount('#card-element');
                    this.card.on('change', function(event) {
                        if(event.complete){
                            document.getElementById("pay-now").classList.remove("disabled");
                        }else{
                            document.getElementById("pay-now").classList.add("disabled");
                        } 
                    });
                    if(this.payment_method){
                        document.getElementById("pay-now").classList.remove("disabled");
                    }
                },
                changed(event,detail){
                    let id=event.target.value;
                    detail=JSON.parse(JSON.stringify(detail))
                    let term = detail.package.terms.filter(o => o.id==id)[0];
                    this.cart.details.filter(o => o.id==detail.id)[0].months=term.months
                },
                getPrice(detail){
                    detail=JSON.parse(JSON.stringify(detail))
                    let term = detail.package.terms.filter(o => o.months==detail.months)[0];
                    let totalPrice=term.months*detail.package.price
                    let disPrice=totalPrice - (term.pivot.discount * (totalPrice / 100))
                    return [disPrice,totalPrice]
                },
                getSubTotalPrice(){
                    let total =0
                    let distotal =0
                    let that=this
                    this.cart.details.forEach(function (detail) {
                        distotal+=that.getPrice(detail)[0]
                        total+=that.getPrice(detail)[1]
                    });
                    return [distotal,total]
                },
                getTotalPrice(){
                    let total =this.getSubTotalPrice()[0]
                    return total-this.getPromo()[0]
                },
                moneyFormat: function (num,fixed=2,sympol='$') {
                    if (num<=0) {return this.free}
                    let val = (num/1).toFixed(fixed).replace('.', '.')
                    return sympol+val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                },
                getTermLengthName(monthCount) {
                    function getPlural(number, word) {
                        return number === 1 && word.one || word.other;
                    }
                    var months = { one: 'Month', other: 'Months' },
                    years = { one: 'Year', other: 'Years' },
                    m = monthCount % 12,
                    y = Math.floor(monthCount / 12),
                    result = [];
                    m && result.push(m + ' ' + getPlural(m, months));
                    y && result.push(y + ' ' + getPlural(y, years));
                    return result.join(' and ');
                },
                getSavedMoney(){
                    return (this.getSubTotalPrice()[1] - this.getTotalPrice())+this.getPromo()[0]
                },
                getPromo(){
                    if (this.promo.value<=0) {return [0,0]}
                    let money=0;
                    let rate=0;
                    let total=this.getSubTotalPrice()[0];
                    if (this.promo.type=='rate') {
                        money=total / this.promo.value
                        rate=this.promo.value
                    }else{
                        money=this.promo.value/1
                        rate=(money*100)/total
                    }
                    return [money,rate]
                },
                editPromo() {
                    this.promo.active=true;
                    setTimeout(() => $('#promo-input').focus(), 500);
                },
                savePromo() {
                    if (this.promo.code) {
                        let data = { params: {  } };
                        this.promo.errorText=null;
                        this.promo.value=0
                        axios.post('/get-promo',{code:this.promo.code}).then(({ data }) => {
                            this.promo.type=data.success.promo.type
                            this.promo.value=data.success.promo.value
                            this.promo.active=false;
                        }).catch(() => {
                            this.promo.errorText="{{__('web.wrong_promo')}}";
                            
                        });
                    }else{
                        this.editPromo()
                    }
                },
                deletePromo() {
                    this.promo.errorText=null;
                    this.promo.active=false
                    this.promo.code=null
                    this.promo.value=0
                },
                changePage(num) {
                    this.page=num;
                    if(num==2){
                        this.drowCardElements();
                    }
                },
                isNumber(event) {
                    event = (event) ? event : window.event;
                    var charCode = (event.which) ? event.which : event.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) ) {
                        event.preventDefault();;
                    } else {
                        return true;
                    }
                },
                async createStripIntent(){
                    var orderData = {
                        "amount": 1099,
                        "currency": "usd",
                        "payment_method_types[]" : "card"
                    }

                    var formBody = [];
                    for (var property in orderData) {
                        var encodedKey = encodeURIComponent(property);
                        var encodedValue = encodeURIComponent(orderData[property]);
                        formBody.push(encodedKey + "=" + encodedValue);
                    }
                    formBody = formBody.join("&");
                    let response = await fetch("https://api.stripe.com/v1/payment_intents", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                            'Authorization': 'Bearer sk_test_51LeyNHENbOgVwcDpyOoWBePZJl4mpBS6ysgBauAyl67koBd5MsQSNjcRUkeewFP5g9CNeX6e9q6gDcUhvcwvB4gJ00YB4wKDSd'
                        },
                        body: formBody
                    });
                    return (await response.json()).client_secret;
                },
                async saveOrder() {
                    

                    if(!this.payment_method){
                        const intentClientSecret = await this.createStripIntent();
                        console.log(intentClientSecret);

                        const payment_method = {
                            card: this.card,
                            billing_details: {
                                name: 'Jenny Rosen',
                            },
                        };

                        stripe.confirmCardPayment(intentClientSecret, {
                            payment_method
                        })
                        .then(function(result) {
                            // Handle result.error or result.paymentIntent
                        });

                        const paymentMethodData = await stripe.createPaymentMethod(
                            'card', this.card, {
                                billing_details: { name: "Jenny Rosen" }
                            }
                        ); 

                        console.log("paymentMethodResult",paymentMethodData);
                    }

                    // if (payment_method.length==0&&this.ccName.length) {
                    //     let that=this
                    //     const { setupIntent, error } = await stripe.confirmCardSetup(
                    //     "{{ $intent->client_secret }}", {
                    //         payment_method: {
                    //             card: that.card,
                    //             billing_details: { name: this.ccName }
                    //         }
                    //     }
                    //     );
                        
                    //     if (error) {
                    //         console.log(error.message);
                    //     } else {
                    //         payment_method=setupIntent.payment_method
                    //     }
                    // }
                    
                    let route="{{ LaravelLocalization::localizeUrl('/orders') }}";
                    let data={
                        payment_method : this.payment_method?this.payment_method:paymentMethodData.paymentMethod.id,
                        cart:this.cart,
                        path:this.path,
                        promo:this.promo.value?this.promo.code:null
                    }
                    axios.post(route,data).then(({ data }) => {
                        if (data.success) {
                            window.location.href = "{{ LaravelLocalization::localizeUrl('/orders') }}/"+data.success;
                        }
                    }).catch((error) => {
                        this.errors=error.response.data.errors
                    });
                },
            }
        }).mount('#checkout-page')
    </script>
    @endif
    
    @endsection
    
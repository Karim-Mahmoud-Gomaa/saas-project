@extends('layouts.app')

@section('seo')
<title>{{$page->name}}</title>
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
</style>
@endsection


@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">{{$page->content[39]}}</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120" id="checkout-page">
    <div v-if="loading" class="text-center">
        <img src="{{asset('')}}assets/web/img/loading.svg">
        <p>Creating Order</p>
    </div>
    <div v-else class="container" >
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
                    <div v-if="page==1" class="card rounded-custom mb-5 summary">
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
                    <div v-else-if="page==2" class="card rounded-custom mb-5 summary">
                        <div class="card-body pt-4">
                            <p class="h5">Total <span class="float-end">{% moneyFormat(getTotalPrice()) %}</span></p>
                        </div>
                        
                        <hr class="me-5 ms-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Card Number <b class="text-danger">*</b></label>
                                        <input class="form-control" @keypress="isNumber($event)" v-model="paymentCard.num" type="text" placeholder="Enter your Card Number">
                                    </div>                            
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Expiration Date <b class="text-danger">*</b></label>
                                        <input class="form-control" @keypress="isDate($event)" v-model="paymentCard.exp" type="text" placeholder="MM/YY">
                                    </div>                            
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Security Code <b class="text-danger">*</b></label>
                                        <input class="form-control" @keypress="isNumber($event)" v-model="paymentCard.code" type="text" placeholder="CVV">
                                    </div>                            
                                </div>
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
                            <button type="submit" :disabled="!checkPaymentCard()" @click="saveOrder()" class="btn btn-success float-end">Pay Now <i class="fa-solid fa-money-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <h2>@lang('web.empty_cart')</h2>
                <a href="{{ LaravelLocalization::localizeUrl('/services') }}" class="btn btn-info">Go Shopping Now <i class="fa-solid fa-cart-arrow-down"></i></a>
            </div>
        </div>
        @endif
    </section>
    <!--style guide sections end-->
    
    @endsection
    @section('js')
    @if (count($cart->details))
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script>
        const { createApp } = Vue
        createApp({
            delimiters: ['{%', '%}'],
            data() {
                return {
                    cart: {!! json_encode($cart->toArray()) !!},
                    path: "",
                    lang: "{{ LaravelLocalization::getCurrentLocale() }}",
                    free:"{{__('web.free')}}",
                    promo:{
                        active:false,
                        code:null,
                        type:'rate',
                        value:0,
                        errorText:null,
                    },
                    paymentCard:{
                        num:'0123456789123456',
                        exp:'12/25',
                        code:'1324',
                    },
                    page:2,
                    errors:null,
                    loading: false,
                }
            },
            methods: {
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
                isDate(event) {
                    if(this.paymentCard.exp&&this.paymentCard.exp.length>=5){
                        event.preventDefault();
                    }
                    event = (event) ? event : window.event;
                    var charCode = (event.which) ? event.which : event.keyCode;
                    if ((charCode > 31 && (charCode < 48 || charCode > 57)) ) {
                        event.preventDefault();;
                    } else {
                        if(this.paymentCard.exp&&this.paymentCard.exp.length==2){
                            this.paymentCard.exp+='/';
                        }
                        return true;
                    }
                },
                checkPaymentCard() {
                    if(
                    !this.paymentCard.exp||!this.paymentCard.code||!this.paymentCard.num||
                    this.paymentCard.num.length<16||this.paymentCard.exp.length<5||
                    this.paymentCard.code.length<3
                    ){
                        return false;
                    }
                    return true;
                    
                },
                saveOrder() {
                    if (this.checkPaymentCard()) {
                        let route="{{ LaravelLocalization::localizeUrl('/orders') }}";
                        let data={
                            paymentCard:{
                                ...this.paymentCard,
                                month : this.paymentCard.exp.split("/")[0],
                                year : this.paymentCard.exp.split("/")[1]
                            },
                            cart:this.cart,
                            path:this.path,
                            promo:this.promo.value?this.promo.code:null
                        }
                        this.loading = true;
                        axios.post(route,data).then(({ data }) => {
                            this.loading = false;
                            if (data.success) {
                                window.location.href = "{{ LaravelLocalization::localizeUrl('/orders') }}/"+data.success;
                            }
                        }).catch((error) => {
                            this.loading = false;
                            this.errors=error.response.data.errors
                        });
                    }
                },
            }
        }).mount('#checkout-page')
    </script>
    @endif
    
    @endsection
    
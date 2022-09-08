@extends('layouts.app')

@section('seo')
<title>{{$product->package->service->name}} ({{$product->package->name}})</title>
@endsection

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('{{asset('')}}assets/web/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">{{$product->package->service->name}} ({{$product->package->name}})</h1>
            </div>
        </div>
    </div>
</section>
<!--page header section end-->
<!--style guide sections start-->
<section class="style-guide ptb-120" id="product-page">
    <div class="container">
        <div class="row">
            <div class="col-12 pe-lg-5">
                <!--color start-->
                <div class="row">
                    <div class="col-12">
                        
                        <div class="card rounded-custom mb-5">
                            <div class="card-body p-5">
                                <h4>
                                    {{$product->package->service->name}} ({{$product->package->name}})
                                    @if ($product->path)
                                    <a href="{{ 'https://www.'.$product->path.'.'.request()->getHttpHost() }}" class="btn btn-info btn-sm float-end">
                                        <i class="fa-solid fa-link"></i> @lang('web.go_to_service') 
                                    </a>
                                    @endif
                                </h4>
                                <p class="ms-3">
                                    @lang('web.expired_at') : {{$product->expired_at->format('d/m/Y')}}
                                </p>
                                <hr v-if="!product.path">
                                <div class="row" v-if="!product.path">
                                    <div class="col-9">

                                        <input type="text" class="form-control" v-model="form.sub_domain"  placeholder="{{__('web.enter_sub')}}">
                                    </div>
                                    <div class="col-3">

                                        <a href="javascript:;" @click="install()" class="btn btn-info btn-sm float-end">
                                            <i class="fa-solid fa-download"></i> @lang('web.install') 
                                        </a>
                                    </div>
                                    <br>
                                    <template v-for="error_group in errors">
                                        <template v-for="error in error_group">
                                            <div class="alert alert-danger" role="alert">{%error%}</div>
                                        </template>
                                    </template>    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--color end-->
            </div>
        </div>
    </div>
</section>
<!--style guide sections end-->

@endsection
@section('js')
<script src="https://unpkg.com/vue@3"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
<script>
    const { createApp } = Vue
    createApp({
        delimiters: ['{%', '%}'],
        data() {
            return {
                product: {!! json_encode($product->toArray()) !!},
                form:{product_id:'{{$product->id}}',sub_domain:null},
                errors:null,
            }
        },
        methods: {
            install(){
                axios.post('/product-install',this.form).then(({ data }) => {
                    if (data.success) {
                        location.reload();
                    }
                }).catch((error) => {
                    this.errors=error.response.data.errors
                });
            },
        }
    }).mount('#product-page')
</script>
@endsection


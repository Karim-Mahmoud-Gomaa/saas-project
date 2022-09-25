<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Page\PageFacade as Page;
use App\Repository\Service\ServiceFacade as Service;
use App\Repository\Product\ProductFacade as Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Repository\Payment\PaymentFacade as Payment;

class WebCompanyController extends Controller
{
   
    //pages
    public function home(Request $request){
        $page=Page::find(2,['*'],[],['content']);//Get Home Page Data
        return view('home',compact('page'));
    }
    public function about_us(){
        $page=Page::find(4,['*'],[],['content']);//Get About_us Page Data
        return view('about_us',compact('page'));
    }
    public function services(){
        $page=Page::find(3,['*'],[],['content']);//Get Service Page Data
        $services=Service::index(['*'],[],[],0);//Get All services
        return view('services',compact('page','services'));
    }
    public function login(){
        if (Auth::user()) {return redirect('/');}
        $page=Page::find(6,['*'],[],['content']);//Get Login Page Data
        return view('login',compact('page'));
    }
    
    public function service($slug){
        $validator = Validator::make([$slug],['required|exists:services,slug']);
        if($validator->fails()){abort(404);}
        $page=Page::find(3,['*'],[],['content']);
        $service=Service::findBySlug($slug,['*'],['active_packages.features','faq']);
        return view('service',compact('page','service'));
    }
    
    public function profile(Request $request){
        $balance=$request->user()->balance();
        $orders=$request->user()->orders()->count();
        $renewals=$request->user()->renewals()->count();
        $payments=count(Payment::GetPaymentMethods($request->user()->id));

        return view('profile',compact('balance','orders','renewals','payments'));
    }
    
    public function renewals(Request $request){
        $request->validate([
            'activation'=>'nullable|in:1,0',
        ]);
        $products=Product::index(['*'],['package.service'],['payment'],0,['is_active','user_id'=>$request->user()->id,]);
        return view('renewals',compact('products'));
    }
    
    
    public function register(){return view('register');}
    public function password_reset(){return view('password_reset');}
    
}

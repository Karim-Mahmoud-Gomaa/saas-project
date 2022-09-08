<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Page\PageFacade as Page;
use App\Repository\Service\ServiceFacade as Service;
use App\Repository\Product\ProductFacade as Product;
use App\Repository\PageTranslation\PageTranslationFacade as PageTranslation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class WebCompanyController extends Controller
{
    public $data = null;

    public function __construct()
    {
        $this->data = Page::find(1)->content;
    }
    //pages
    public function home(){
        $page=Page::find(2,['*'],[],['content']);//Get Home Page Data
        return view('home',compact('page'))->with("data",$this->data);
    }
    public function about_us(){
        $page=Page::find(4,['*'],[],['content']);//Get About_us Page Data
        return view('about_us',compact('page'))->with("data",$this->data);
    }
    public function services(){
        $page=Page::find(3,['*'],[],['content']);//Get Service Page Data
        $services=Service::index(['*'],[],[],0);//Get All services
        return view('services',compact('page','services'))->with("data",$this->data);
    }
    public function login(){
        if (Auth::user()) {return redirect('/');}
        $page=Page::find(6,['*'],[],['content']);//Get Login Page Data
        return view('login',compact('page'))->with("data",$this->data);
    }

    public function service($slug){
        $validator = Validator::make([$slug],['required|exists:services,slug']);
        if($validator->fails()){abort(404);}
        $page=Page::find(3,['*'],[],['content']);
        $service=Service::findBySlug($slug,['*'],['active_packages.features','faq']);
        return view('service',compact('page','service'))->with("data",$this->data);
    }

    public function profile(){
        return view('profile')->with("data",$this->data);
    }

    public function renewals(Request $request){
        $request->validate([
            'activation'=>'nullable|in:1,0',
        ]);
        $products=Product::index(['*'],['package.service'],[],0,['is_active']);
        return view('renewals',compact('products'))->with("data",$this->data);
    }
    
    public function register(){return view('register');}
    public function password_reset(){return view('password_reset');}
    
    //actions
    public function signup(Request $request){return redirect()->route('home');}
    public function login_company(Request $request){return redirect()->route('home');}
    public function reset_company(Request $request){return redirect()->route('login');}
    
}

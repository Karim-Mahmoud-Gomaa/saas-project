<?php

namespace Modules\WebCompany\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WebCompanyController extends Controller
{
    //pages
    public function index(){return view('webcompany::home');}
    public function login(){return view('webcompany::login');}
    public function register(){return view('webcompany::register');}
    public function password_reset(){return view('webcompany::password_reset');}
    
    //actions
    public function signup(Request $request){return redirect()->route('home');}
    public function login_company(Request $request){return redirect()->route('home');}
    public function reset_company(Request $request){return redirect()->route('login');}

}

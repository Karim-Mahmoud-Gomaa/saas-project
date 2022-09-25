<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use App\Repository\User\UserFacade as User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate(['email' => 'required|email|max:255',
        'password'=> 'required|string|min:6']);
        
        $auth=User::login($request);
        if ($auth) {
            return redirect('/');
        }
        return back()->withErrors(['phone' => 'You have entered an invalid phone or password']);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'company'=> 'nullable|string|max:100',
            'password'=> 'required|confirmed|string|min:8',
            // 'terms'=> 'required',
        ]);
        $auth=User::create($request);
        if ($auth) {
            return redirect('login');
        }
        return back()->withErrors(['phone' => 'You have entered an invalid Data']);
    }    
    
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }    
    
}

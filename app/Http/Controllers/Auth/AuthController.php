<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        // $this->create([
        //     'name'=>'kiko',
        //     'email'=>'user@test.com',
        //     'password'=>'password',
        // ]);
        // dd(Auth::user()->toArray());

        $request->validate(['email' => 'required|email|max:255',
        'password'=> 'required|string|min:6']);
        // User::where(
            
            // )->first();
            $credentials = $request->only('email', 'password');
        
        // Auth::login($user);
        // dd($credentials,Auth::attempt($credentials));

        if (Auth::attempt($credentials, true)) {
            return redirect('/');
        }
   
        return redirect("login")->withSuccess('Login details are not valid');


        $auth = Auth::attempt(['phone' => $request->phone, 'password' => $request->password]);
        if ($auth) {
            return redirect('/');
        } else {
            return back()->withErrors(['phone' => 'You have entered an invalid phone or password']);
        }



        dd(Auth::getProvider());
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }    
    
}

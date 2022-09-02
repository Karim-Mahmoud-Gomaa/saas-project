<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        // $data = $request->validate([
            //     'name' => 'required|max:255',
            //     'email' => 'required|email|unique:users',
            //     'password' => 'required|confirmed',
            // ]);
            
            // $data['password'] = Hash::make($request->password);
            
            // $user = User::create($data);
            
            // $token = $user->createToken('API Token')->accessToken;
            
            // return response([ 'user' => $user, 'token' => $token]);
        }
        
        public function login(Request $request)
        {
            $data = $request->all();
            $validator = Validator::make($data, [
                'email' => 'required|email',
                'password' => ['required',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'min:6'],
            ]);
            
            
            if($validator->fails()){
                return response()->json([
                    'errors_bag' => $validator->errors(),
                    'message'=>'error',
                    'error'=>'Validation Error'
                ],400);
            }
            
            $user = User::where('email',$data['email'])->first();
            
            if($user){
                if(Hash::check($data['password'],$user->password)){
                    return response()->json([
                        "accessToken" => $user->createToken('BZNSMonster')->accessToken,
                        'message'=>'success',
                        'success' => 'User Authenticated'
                    ],200);
                }else{
                    
                    return response()->json([
                        'message'=>'error',
                        'error'=>'Incorrect Details'
                    ],400);
                }
                
            }else{
                return response()->json([
                    'message'=>'error',
                    'error'=>'Incorrect Details'
                ],400);
            }
            
            // $token = auth()->user()->createToken('API Token')->accessToken;
            
            // return response(['user' => auth()->user(), 'token' => $token]);
            
        }
    }
    
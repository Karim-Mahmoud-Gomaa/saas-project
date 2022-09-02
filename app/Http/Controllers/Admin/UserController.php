<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserCollection;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::with('roles')->where('is_admin','1')->paginate();
        return response()->json([ 'users' =>new UserCollection($users),
        'message' => 'success'], 200);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'email' => 'required|max:255|unique:users,email',
            'password' => ['required',
            'confirmed',
            'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'min:6'],
        ]);
        
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        
        $data['password'] = Hash::make($data['password']);
        $data['is_admin'] = true;
        
        $user = User::create($data);
        
        return response()->json([ 'user' => new
        UserResource($user),
        'message' => 'Success'], 201);
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function show($user)
    {
        if($user=User::with('roles')->find($user)){
            return response([ 'user' => new
            UserResource($user), 'message' => 'Success'], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        // dd($request->name);
        $validator = Validator::make($data, [
            'name' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
            'password' => ['nullable',
            'confirmed',
            'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'min:6'],
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        
        $user->update($data);
        
        return response([ 'user' => new
        UserResource($user), 'message' => 'Success'], 200);
    }
    
    public function updateRoles(Request $request, $user){
        
        if($user=User::with('roles')->find($user)){
            $roles = $request->only('roles');
            $user->syncRoles($roles);
            return response([ 'user' => new
            UserResource($user), 'message' => 'Success'], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy($user)
    {
        
        if($user=User::find($user)){
            $user->delete();
            return response(['message' => 'success','success'=>'User Deleted'], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
}

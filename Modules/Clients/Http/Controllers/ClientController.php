<?php

namespace Modules\Clients\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Models\User;
use Modules\Clients\Entities\Client;
use Modules\Clients\Transformers\ClientCollection;
use Modules\Clients\Transformers\ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $clients = Client::with('roles')->notAdmin()->paginate();
        return response()->json([
            'users' =>new ClientCollection($clients),
            'message' => 'success'
        ], 200);
    }
    public function trashed()
    {
        $clients = Client::with('roles')->notAdmin()->onlyTrashed()->paginate();
        return response()->json([
            'users' =>new ClientCollection($clients),
            'message' => 'success'
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'email' => 'required|max:255|unique:users,email',
            'is_active' => 'nullable|boolean',
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
        $data['is_admin'] = false;

        $user = Client::create($data);

        return response()->json([ 'user' => new
        ClientResource($user),
        'message' => 'Success'], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($client)
    {
        if($client=Client::with('roles')->find($client)){
            return response([
                'client' => new ClientResource($client),
                'message' => 'Success'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->all();
        // dd($request->name);
        $validator = Validator::make($data, [
            'name' => 'nullable|max:50',
            'email' => 'nullable|email|max:255',
            'is_active' => 'nullable|boolean',
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

        $client->update($data);

        return response([
            'client' => new ClientResource($client),
            'message' => 'Success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($client)
    {
        if($client=Client::find($client)){
            $client->delete();
            return response([
                'message' => 'success',
                'success'=>'Client Deleted'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function forceDelete($client)
    {
        if($client=Client::find($client)){
            $client->forceDelete();
            return response([
                'message' => 'success',
                'success'=>'Client Deleted Permanently'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function restoreDeleted($client)
    {
        if($client = Client::withTrashed()->where('id',$client)->first()){
            $client->restore();

            return response([
                'message' => 'success',
                'success'=>'Client Restored'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function activate($client){
        if($client=Client::find($client)){
            if($client->is_active){
                return response([
                    'message' => 'error',
                    'error'=>'Client Already Active'
                ], 400);
            }else{
                $client->update(['is_active'=>true]);
                return response([
                    'message' => 'success',
                    'success'=>'Client Activated'
                ], 200);
            }
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function deactivate($client){
        if($client=Client::find($client)){
            if(! $client->is_active){
                return response([
                    'message' => 'error',
                    'error'=>'Client Already Deactivated'
                ], 400);
            }else{
                $client->update(['is_active'=>false]);
                return response([
                    'message' => 'success',
                    'success'=>'Client Deactivated'
                ], 200);
            }
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
}

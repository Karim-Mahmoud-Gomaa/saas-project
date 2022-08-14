<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PermissionCollection;
use App\Http\Resources\Admin\RoleCollection;
use App\Http\Resources\Admin\RoleResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::paginate();
        return response([
            'roles' => new RoleCollection($role),
            'message' => 'success'
        ], 200);
    }

    /**
     * Display a listing of the role permissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function rolePermissions($role)
    {
        if($role = Role::find($role)){
            $permissions = $role->permissions()->get();

            return response([
                'role' => new RoleResource($role),
                'permissions' => new PermissionCollection($permissions),
                'message' => 'success'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    /**
     * Display a listing of the permissions
     *
     * @return \Illuminate\Http\Response
     */
    public function permissions()
    {
        $permission = Permission::all();
        return response([
            'permissions' => new PermissionCollection($permission),
            'message' => 'success'
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name');
        $validator = Validator::make($data, [
            'name' => 'required|max:50|unique:roles,name',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }

        $role = Role::create($data);
        return response([
            'role' => new RoleResource($role),
            'message' => 'success',
            'success' => 'Object Created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        if($role = Role::find($role)){
        $permissions = $role->permissions()->get();

            return response([
                'role' => new RoleResource($role),
                'permissions' => new PermissionCollection($permissions),
                'message' => 'success'
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function updatePermissions(Request $request, $role)
    {
        if($role = Role::find($role)){
            // dd($request->only('permissions'));
            $data = $request->only('permissions');
            $role->syncPermissions($data);
            $permissions = $role->permissions()->get();
            return response([
                'role' => new RoleResource($role),
                'permissions' => new PermissionCollection($permissions),
                'message' => 'success',
                'success' => 'Object Updated'
            ], 200);
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
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
        // check if role assigned dont delete it
        if($role = Role::find($role)){
            $users = User::role($role->name)->get();
            if(sizeof($users)){
                return response()->json([
                    'message'=>'error',
                    'error'=>'Role Assigned'
                ],400);
            }else{
                $role->delete();
                return response([
                    'message' => 'success',
                    'success' => 'Obejct Deleted'
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

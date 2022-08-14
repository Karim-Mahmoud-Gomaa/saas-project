<?php

namespace Modules\PageBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\PageBuilder\Entities\MenuItem;
use Modules\PageBuilder\Transformers\MenuItemCollection;
use Modules\PageBuilder\Transformers\MenuItemResource;

class MenuItemItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $menuItems = MenuItem::all();
        return response([
            'menuItem' => new MenuItemCollection($menuItems),
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
            'name' => 'required|max:50|unique:pb_menuItems,name',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        // $data['slug'] = $data['slug']??Str::slug($data['name']);
        $menuItem = MenuItem::create($data);
        $menuItem->slug = $this->generateSlug($menuItem);
        $menuItem->save();
        return response([
            'menuItem' => new MenuItemResource($menuItem),
            'message' => 'success',
            'success' => 'Menu Item Created'
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $menuItem
     * @return Response
     */
    public function show($menuItem)
    {
        if($menuItem=MenuItem::with('blocks')->find($menuItem)){
            return response([
                'menuItem' => new MenuItemResource($menuItem),
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
     * @param Request $request
     * @param int $menuItem
     * @return Response
     */
    public function update(Request $request, $menuItem)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'nullable|max:50|unique:pb_menuItems,id,'.$menuItem,
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        $menuItem = MenuItem::findOrFail($menuItem);
        $menuItem->update($data);
        return response([
            'menuItem' => new MenuItemResource($menuItem),
            'message' => 'success',
            'success' => 'Menu Item Updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $menuItem
     * @return Response
     */
    public function destroy($menuItem)
    {
        if($menuItem = MenuItem::find($menuItem)){
            $menuItem->delete();
            return response([
                'message' => 'success',
                'success' => 'Menu Item Deleted'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
}

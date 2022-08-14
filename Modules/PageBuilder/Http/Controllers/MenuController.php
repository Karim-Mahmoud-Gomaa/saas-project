<?php

namespace Modules\PageBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\PageBuilder\Entities\Menu;
use Modules\PageBuilder\Entities\MenuItem;
use Modules\PageBuilder\Entities\Page;
use Modules\PageBuilder\Transformers\MenuCollection;
use Modules\PageBuilder\Transformers\MenuResource;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $menus = Menu::with('items')->paginate();
        return response([
            'menu' => new MenuCollection($menus),
            'message' => 'success'
        ], 200);
    }
    public function trashed()
    {
        $menus = Menu::with('items')->onlyTrashed()->paginate();
        return response([
            'menu' => new MenuCollection($menus),
            'message' => 'success'
        ], 200);
    }

    public function addItem(Request $request, Menu $menu){
        $data = $request->all();
        if(!$page = Page::find($data['page_id'])){
            return response()->json([
                'message'=>'error',
                'error'=>'Page Not Found'
            ],404);
        }

        $item = MenuItem::create([
            'menu_id' => $menu->id,
            'page_id' => $page->id,
            'title' => $data['title'] ?? $page->title,
            'order' => $data['order'] ?? 0,
        ]);

        $menu = Menu::with('items')->find($menu->id);

        return response([
            'menu' => new MenuResource($menu),
            'message' => 'success',
            'success' => 'Menu Created'
        ], 201);
    }
    public function updateItem(Request $request, $menu, $item){
        $data = $request->all();
        if(isset($data['page_id']) && ! Page::find($data['page_id'])){
            return response()->json([
                'message'=>'error',
                'error'=>'Page Not Found'
            ],404);
        }
        if(! Menu::find($menu)){
            return response()->json([
                'message'=>'error',
                'error'=>'Menu Not Found'
            ],404);
        }
        if($item = MenuItem::find($item)){
            $item->update($data);
            $menu = Menu::with('items')->find($item->menu->id);
            return response([
                'menu' => new MenuResource($menu),
                'message' => 'success',
                'success' => 'Menu Item Updated'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function removeItem($menu, $item){
        if(! Menu::find($menu)){
            return response()->json([
                'message'=>'error',
                'error'=>'Menu Not Found'
            ],404);
        }
        if($item = MenuItem::find($item)){
            $item->delete();
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

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|unique:pb_menus,name',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        $menu = Menu::create($data);
        $menu->save();
        return response([
            'menu' => new MenuResource($menu),
            'message' => 'success',
            'success' => 'Menu Created'
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $menu
     * @return Response
     */
    public function show($menu)
    {
        if($menu=Menu::with('items')->find($menu)){
            return response([
                'menu' => new MenuResource($menu),
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
     * @param int $menu
     * @return Response
     */
    public function update(Request $request, $menu)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'nullable|max:50|unique:pb_menus,id,'.$menu,
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        $menu = Menu::findOrFail($menu);
        $menu->update($data);
        return response([
            'menu' => new MenuResource($menu),
            'message' => 'success',
            'success' => 'Menu Updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $menu
     * @return Response
     */
    public function destroy($menu)
    {
        if($menu = Menu::find($menu)){
            $menu->delete();
            return response([
                'message' => 'success',
                'success' => 'Menu Deleted'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function forceDelete($menu)
    {
        if($menu=Menu::onlyTrashed()->find($menu)){
            $menu->forceDelete();
            return response([
                'message' => 'success',
                'success'=>'Menu Deleted Permanently'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function restoreDeleted($menu)
    {
        if($menu = Menu::withTrashed()->where('id',$menu)->first()){
            $menu->restore();

            return response([
                'message' => 'success',
                'success'=>'Menu Restored'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
}

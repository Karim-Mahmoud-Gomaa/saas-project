<?php

namespace Modules\PageBuilder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\PageBuilder\Entities\Page;
use Modules\PageBuilder\Transformers\PageCollection;
use Modules\PageBuilder\Transformers\PageResource;
use Illuminate\Support\Str;
use Modules\PageBuilder\Transformers\PageBlockResource;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pages = Page::with('blocks')->paginate();
        return response([
            'page' => new PageCollection($pages),
            'message' => 'success'
        ], 200);
    }
    public function trashed()
    {
        $pages = Page::with('blocks')->onlyTrashed()->paginate();
        return response([
            'page' => new PageCollection($pages),
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
            'name' => 'required|max:50|unique:pb_pages,name',
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        // $data['slug'] = $data['slug']??Str::slug($data['name']);
        $page = Page::create($data);
        $page->slug = $this->generateSlug($page);
        $page->save();
        return response([
            'page' => new PageResource($page),
            'message' => 'success',
            'success' => 'Page Created'
        ], 201);
    }

    private function generateSlug(Page $page){
        return Str::slug($page->title);
    }

    public function assignHome($page){
        if($page = Page::find($page)){
            // if the current page is_404 don't assign it
            if($page->is_404){
                return response()->json([
                    'message'=>'error',
                    'error'=>'Cannot assign the 404 page as homepage'
                ],400);
            }
            // if the current page is already home don't assign it
            if($page->is_home){
                return response()->json([
                    'message'=>'success',
                    'success'=>'Page already assigned!'
                ],200);
            }
            // Remove current homepage
            $currentHomePage = Page::where('is_home',true)->first();
            if($currentHomePage){
                $currentHomePage->update(['is_home',false]);
                $currentHomePage->slug = $this->generateSlug($currentHomePage);
                $currentHomePage->save();
            }

            $page->update([
                'is_home'=>true,
                'slug'=>''
            ]);

            return response([
                'message' => 'success',
                'success' => 'New Homepage Assigned'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function assign404($page){
        if($page = Page::find($page)){
            // if the current page is_home don't assign it
            if($page->is_home){
            $table->string('footer');
            return response()->json([
                    'message'=>'error',
                    'error'=>'Cannot assign the homepage page as 404'
                ],400);
            }
            // if the current page is already home don't assign it
            if($page->is_404){
                return response()->json([
                    'message'=>'success',
                    'success'=>'Page already assigned!'
                ],200);
            }
            // Remove current homepage
            if($currentHomePage = Page::where('is_404',true)->update(['is_404'=>false])){
                $currentHomePage->slug = $this->generateSlug($currentHomePage);
                $currentHomePage->save();
            }

            $page->update([
                'is_404'=>true,
                'slug'=>'404'
            ]);

            return response([
                'message' => 'success',
                'success' => 'New Error 404 Page Assigned'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }

    /**
     * Show the specified resource.
     * @param int $page
     * @return Response
     */
    public function show($page)
    {
        if($page=Page::with('blocks')->find($page)){
            return response([
                'page' => new PageResource($page),
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
     * @param int $page
     * @return Response
     */
    public function update(Request $request, $page)
    {
        $data = $request->except(['is_home','is_404']);
        $validator = Validator::make($data, [
            'name' => 'nullable|max:50|unique:pb_pages,id,'.$page,
        ]);
        if($validator->fails()){
            return response()->json([
                'errors_bag' => $validator->errors(),
                'message'=>'error',
                'error'=>'Validation Error'
            ],400);
        }
        $page = Page::findOrFail($page);
        $page->update($data);
        return response([
            'page' => new PageResource($page),
            'message' => 'success',
            'success' => 'Page Updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $page
     * @return Response
     */
    public function destroy($page)
    {
        if($page = Page::find($page)){
            $page->delete();
            return response([
                'message' => 'success',
                'success' => 'Page Deleted'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function forceDelete($page)
    {
        if($page=Page::onlyTrashed()->find($page)){
            $page->forceDelete();
            return response([
                'message' => 'success',
                'success'=>'Page Deleted Permanently'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function restoreDeleted($page)
    {
        if($page = Page::withTrashed()->where('id',$page)->first()){
            $page->restore();

            return response([
                'page' => new PageResource($page),
                'message' => 'success',
                'success'=>'Page Restored'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
    public function getContent($page){
        if($page = Page::find($page)){
            return response([
                'content' => new PageBlockResource($page->blocks()),
                'message' => 'success',
                'success' => 'Page Updated'
            ], 200);
        }else{
            return response()->json([
                'message'=>'error',
                'error'=>'Not Found'
            ],404);
        }
    }
}

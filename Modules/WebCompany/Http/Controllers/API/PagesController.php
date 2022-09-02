<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Page\PageFacade as Page;
use App\Models\Page as PageModel;

class PagesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        if(isset($request->paginate)){
            $success['pages']=Page::index(['id','name'],[],[],$request->paginate);
        }else{
            $success['pages']=Page::index();
        }
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,PageModel $page)
    {
        // dd($request->all());
        // foreach ($request->elements as $value) {
        //     Page::create([
        //         'name'=>$value['name'],
        //         'id_name'=>$value['id'],
        //         'parent_name'=>$value['parent'],
        //         'data'=>$value['component'],
        //     ]);
        // }
        $success=Page::update($page->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\FAQ\FAQFacade as FAQ;
use App\Models\FAQ as FAQModel;

class FAQController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $filter=json_decode($request->filter?$request->filter:"{}", true);
        $paginate=isset($request->paginate)?$request->paginate:10;
        $success['faq']=FAQ::index(['*'],['service'],[],$paginate,$filter);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $success = FAQ::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,FAQModel $faq)
    {
        $success=FAQ::update($faq->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(FAQModel $faq)
    {
        $success=FAQ::delete($faq->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

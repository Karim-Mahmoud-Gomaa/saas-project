<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\PageTranslation\PageTranslationFacade as PageTranslation;
use App\Models\PageTranslation as PageTranslationModel;

class PageTranslationsController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $filter=json_decode($request->filter?$request->filter:"{}", true);
        $success['translations']=PageTranslation::index(['*'],['page'],[],10,$filter);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,PageTranslationModel $page_translation)
    {
        $success=PageTranslation::update($page_translation->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

}

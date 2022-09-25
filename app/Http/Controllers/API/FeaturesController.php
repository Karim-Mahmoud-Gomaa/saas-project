<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Feature\FeatureFacade as Feature;
use App\Models\Feature as FeatureModel;

class FeaturesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $filter=json_decode($request->filter?$request->filter:"{}", true);
        $success['features']=Feature::index(['*'],['service','packages'],[],10,$filter);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $success = Feature::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,FeatureModel $feature)
    {
        $success=Feature::update($feature->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(FeatureModel $feature)
    {
        $success=Feature::delete($feature->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

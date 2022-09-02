<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Service\ServiceFacade as Service;
use App\Models\Service as ServiceModel;

class ServicesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        if(isset($request->paginate)){
            $success['services']=Service::index(['id','name'],[],[],$request->paginate);
        }else{
            $success['services']=Service::index();
        }
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'phone' => 'required|unique:clients,phone',
        // ]);
        $success = Service::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,ServiceModel $Service)
    {
        $success=Service::update($Service->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(ServiceModel $Service)
    {
        $success=Service::delete($Service->id);
        return response()->json(['success' => $success], $this->successStatus);
    }
}

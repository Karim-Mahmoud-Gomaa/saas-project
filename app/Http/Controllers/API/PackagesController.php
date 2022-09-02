<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Package\PackageFacade as Package;
use App\Models\Package as PackageModel;
use App\Repository\Service\ServiceFacade as Service;
use App\Repository\Term\TermFacade as Term;

class PackagesController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $filter=json_decode($request->filter?$request->filter:"{}", true);
        $paginate=isset($request->paginate)?$request->paginate:10;
        $success['packages']=Package::index(['*'],['service','terms'],[],$paginate,$filter);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function create(Request $request)
    {
        
        $success['services'] = Service::index(['id','name'],[],[],0);
        $success['terms'] = Term::index(['*'],[],[],0);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string',
        //     'phone' => 'required|unique:clients,phone',
        // ]);
        $success = Package::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,PackageModel $package)
    {
        $success=Package::update($package->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(PackageModel $package)
    {
        $success=Package::delete($package->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

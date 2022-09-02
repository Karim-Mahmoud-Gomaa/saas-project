<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Renewal\RenewalFacade as Renewal;
use App\Models\Renewal as RenewalModel;

class RenewalsController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $success['renewals']=Renewal::index(['*'],['user'],[],10);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|unique:renewals,months',
        ]);
        $success = Renewal::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,RenewalModel $renewal)
    {
        $request->validate([
            'months' => 'required|unique:renewals,months,'.$renewal->id,
        ]);
        $success=Renewal::update($renewal->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(RenewalModel $renewal)
    {
        $success=Renewal::delete($renewal->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

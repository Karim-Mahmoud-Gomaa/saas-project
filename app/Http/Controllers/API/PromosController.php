<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Promo\PromoFacade as Promo;
use App\Models\Promo as PromoModel;

class PromosController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $success['promos']=Promo::index(['*'],['user'],[],10);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|unique:promos,months',
        ]);
        $success = Promo::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,PromoModel $promo)
    {
        $request->validate([
            'months' => 'required|unique:promos,months,'.$promo->id,
        ]);
        $success=Promo::update($promo->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(PromoModel $promo)
    {
        $success=Promo::delete($promo->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Promo\PromoFacade as Promo;


class ClientsController extends Controller
{
    public $successStatus = 200;
    public $notFoundStatus = 404;

    public function getPromo(Request $request)
    {
        $request->validate([
            'code'=>'required|exists:promos,code',
        ]);
        $success['promo']=Promo::find($request->code);
        if (!$success['promo']->expired_at||$success['promo']->expired_at>=now()) {
            return response()->json(['success' => $success], $this->successStatus);
        }
        return response()->json(['message' => 'Not Found'], $this->notFoundStatus);
    }


}

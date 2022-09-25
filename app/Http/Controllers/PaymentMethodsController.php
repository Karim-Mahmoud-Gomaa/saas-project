<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Payment\PaymentFacade as Payment;
use App\Repository\Product\ProductFacade as Product;

class PaymentMethodsController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $payment_methods=Payment::GetPaymentMethods($request->user()->id);
        $intent=$request->user()->createSetupIntent();
        return view('payments',compact('payment_methods','intent'));
    }

    public function store(Request $request)
    {
        $success=Payment::addPaymentMethod($request->user()->id,$request->payment_method);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function getUserPayments(Request $request)
    {
        $success['payment_methods']=Payment::GetPaymentMethods($request->user()->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function destroy(Request $request,string $payment_method)
    {
        $user_id=$request->user()->id;
        $payment_methods=Payment::GetPaymentMethods($user_id);
        
        if (count($payment_methods)>1&&$request->user()->findPaymentMethod($payment_method)) {
            $success=Payment::deletePaymentMethod($user_id,$payment_method);

            // $payment_method=Payment::GetPaymentMethods($user_id)[0];
            foreach ($payment_methods as $key => $value) {
                if ($value->id!=$payment_method) {
                    Product::updatePayment($user_id,$payment_method,$value->id);
                    // dd($user_id,$payment_method,$value->id);
                    return response()->json(['success' => $success], $this->successStatus);
                }
            }
        }
        return response()->json(['message' => 'error'], $this->successStatus);
    }

}

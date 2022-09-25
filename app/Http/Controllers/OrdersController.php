<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Repository\Order\OrderFacade as Order;
use App\Models\Order as OrderModel;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
    * Display a listing of the resource.
    * @return Response
    */
    public function index(Request $request)
    {
        $orders= Order::index(['*'],['details.package.service','promo'],[],0,['user_id'=>$request->user()->id,'is_active'=>true]);
        return view('orders',compact('orders'));
    }
    /**
    * Display a listing of the resource.
    * @return Response
    */
    public function addPackage(Package $package)
    {
        $status=Order::addPackage($package);
        return ($status) ? redirect()->route('checkout') : back();
    }
    
    public function checkout(Request $request)
    {
        $cart=Order::find(Order::getCart()->id,['*'],['details.package.service','details.package.terms']);
        $intent=$request->user()->createSetupIntent();
        //////////////////////////////Test
        $payment_methods = Auth::user()->paymentMethods();
        //////////////////////////////
        return view('checkout',compact('cart','payment_methods','intent'));
    }
    /**
    * Store a newly created resource in storage.
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'promo'=>'nullable|exists:promos,code',
        ]);
        $request->user()->addPaymentMethod($request->payment_method);
        $success= Order::create($request);
        return response()->json(['success' => $success], 200);
    }
    
    /**
    * Show the specified resource.
    * @param int $id
    * @return Response
    */
    public function show(OrderModel $order)
    {
        if (!$order->is_active||$order->user_id!=Auth::user()->id) {
            abort(404);
        }
        dd($order->toArray());
    }
    
    /**
    * Update the specified resource in storage.
    * @param Request $request
    * @param int $id
    * @return Response
    */
    public function update(Request $request, Order $client)
    {
        
    }
    
    /**
    * Remove the specified resource from storage.
    * @param int $id
    * @return Response
    */
    public function destroyPackage(Package $package)
    {
        Order::getCart()->details()->where('package_id',$package->id)->delete();
        return back();
    }
    
    /**
    * Remove the specified resource from storage.
    * @param int $id
    * @return Response
    */
    public function destroy($client)
    {
        
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Repository\Order\OrderFacade as Order;
use App\Models\Order as OrderModel;
use App\Models\Package;



use App\Repository\Page\PageFacade as Page;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
    * Display a listing of the resource.
    * @return Response
    */
    public function index(Request $request)
    {
        $data = Page::find(1)->content;

        $orders= Order::index(['*'],['details.package.service','promo'],[],0,['user_id'=>$request->user()->id,'is_active'=>true]);
        // dd($orders->toArray());
        return view('orders',compact('orders','data'));
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
    
    public function checkout()
    {
        $page=Page::find(5,['*'],[],['content']);//Get About_us Page Data
        $data = Page::find(1)->content;
        $cart=Order::find(Order::getCart()->id,['*'],['details.package.service','details.package.terms']);
        // dd($cart->toArray());
        return view('checkout',compact('cart','page','data'));
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
            'paymentCard.num'=>'required|digits:16',
            'paymentCard.code'=>'required|numeric',
            'paymentCard.month'  =>'required|digits_between:1,12',
            'paymentCard.year'  =>'required|numeric|min:21',
        ]);

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
        return view("post_create_order");
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

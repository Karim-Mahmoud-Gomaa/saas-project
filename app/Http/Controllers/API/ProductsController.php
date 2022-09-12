<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Product\ProductFacade as Product;
use App\Models\Product as ProductModel;

class ProductsController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $success['products']=Product::index(['*'],['user','package.service'],[],10);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function store(Request $request)
    {
        $request->validate([
            'months' => 'required|unique:products,months',
        ]);
        $success = Product::create($request);
        return response()->json(['success' => $success], $this->successStatus);
    }

    public function update(Request $request,ProductModel $product)
    {
        $request->validate([
            'months' => 'required|unique:products,months,'.$product->id,
        ]);
        $success=Product::update($product->id,$request);
        return response()->json(['success' => 'success'], $this->successStatus);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param    \App\OrderDetail  $client
    * @return  \Illuminate\Http\Response
    */
    public function destroy(ProductModel $product)
    {
        $success=Product::delete($product->id);
        return response()->json(['success' => $success], $this->successStatus);
    }

}

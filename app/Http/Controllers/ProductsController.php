<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Repository\Page\PageFacade as Page;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;
use App\Repository\Product\ProductFacade as Product;

class ProductsController extends Controller
{
    public $data = null;
    public $successStatus = 200;

    public function __construct()
    {
        $this->data = Page::find(1)->content;
    }

    public function show(ProductModel $product){
        $product=Product::find($product->id,['*'],['package.service']);
        return view('product',compact('product'))->with("data",$this->data);
    }

    public function install(Request $request){
        $request->validate([
            'product_id'=>'required|exists:products,id',
            'sub_domain' => 'required|unique:products,path',
        ]);
        $product=Product::find($request->product_id);
        $success['product']=Product::update($product->id,['path'=>$request->sub_domain]);

        /**WHM Code Here
        *
        *
        */

        return response()->json(['success' => $success], $this->successStatus);
    }
    
}

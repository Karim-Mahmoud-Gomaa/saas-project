<?php

namespace App\Repository\Order;

use App\Models\Order;
use App\Repository\Order\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Package,OrderDetail};
use App\Repository\Promo\PromoFacade;
use Illuminate\Support\Facades\DB;
use App\Repository\Product\ProductFacade as Product;

class OrderRepository implements OrderRepositoryInterface
{
   // use AuthOrderRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Order $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Order{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      ->when(isset($filter['user_id']),function($q) use($filter){
         $q->where('user_id',$filter['user_id']);
      })
      ->when(isset($filter['is_active']),function($q) use($filter){
         $q->where('is_active',$filter['is_active']);
      })->orderBy('created_at','desc');
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->getCart();
      $promo=$request->promo?PromoFacade::find($request->promo,['id'])->id:null;
      DB::beginTransaction();
      $model->update(['is_active'=>true,'promo_id'=>$promo]);
      foreach ($request['cart']['details'] as $key => $value) {
         $detail=OrderDetail::whereId($value['id'])->where('order_id',$model->id)->with('package.terms')->first();
         $months=1;$discount=0;
         foreach ($detail->package->terms as $term) {
            if ($term->months==$value['months']) {
               $months=$term->months;
               $discount=$term->pivot->discount;
               Product::create([
                  'package_id'=>$detail->package_id,
                  'user_id'=>Auth::user()->id,
                  'months'=>$term->months,
               ]);
            }
         }
         $detail->update(['months'=>$months,'discount'=>$discount]);
      }
      // DB::rollBack();
      DB::commit();
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      if (isset($request->name)) {
         $model->setTranslation('name',$request->lang,$request->name);
      }else{
         $model->price=$request->price;
         $model->is_active=$request->is_active;
         
      }
      $model->save();
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
   public function addPackage(Package $package):bool{
      $cart = $this->getCart();
      $packageExists = $cart->details()->where('package_id',$package->id)->first();
      if (!$packageExists) {
         $term=$package->terms()->first();
         if (!isset($term)) {
            return false;
         }
         $cart->details()->create([
            'package_id'=>$package->id,
            'price'=>$package->price,
            'months'=>$term->months,
            'discount'=>$term->pivot->discount,
         ]);
      }
      
      return true;
   }
   
   
   //Done
   public function UpdatePackagePrice(int $package_id,float $price):bool{
      $ids=$this->model->where('is_active',false)->get()->pluck('id');
      OrderDetail::whereIn('order_id',$ids)->where('package_id',$package_id)
      ->update(['price'=>$price]);
      
      return true;
   }
   
   public function getCart():Order{
      $client = Auth::user();
      $model = $this->model->firstOrCreate(
         ['user_id'=>$client->id,'is_active'=>false]
      );
      return $model;
   }
   
}
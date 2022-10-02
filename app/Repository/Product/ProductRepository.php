<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ProductRepository implements ProductRepositoryInterface
{
   // use AuthProductRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Product $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Product{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      ->when(isset($filter['user_id']),function($q) use($filter){
         $q->where('user_id',$filter['user_id']);
      })
      ->when(isset($filter['is_active']),function($q) use($filter){
         $q->where('is_active',$filter['is_active']);
      })
      ->orderBy('expired_at','asc');
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(array $data):int{
      
      $model = $this->model->firstOrCreate(
         [
            'package_id'=>$data['package_id'],
            'user_id'=>$data['user_id'],
            'is_active'=>1,
            'path'=>$data['path'],
            'expired_at'=>(Carbon::today())->addMonths($data['months'])
         ]
      );
      return $model->id; 
   }
   
   public function update(int $id,array $data):bool{
      $model=$this->model->find($id);
      $model->update([
         'expired_at'=>isset($data['expired_at'])?$data['expired_at']:$model->expired_at,
         'is_active'=>isset($data['is_active'])?$data['is_active']:$model->is_active,
         'path'=>isset($data['path'])?$data['path']:$model->path,
         'payment_id'=>isset($data['payment_id'])?$data['payment_id']:$model->payment_id,
      ]);
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
   
   public function updatePayment(int $user_id,string $old_payment_id,string $new_payment_id):bool{
      $model=$this->model->where('user_id',$user_id)->where('payment_id',$old_payment_id)
      ->update(['payment_id'=>$new_payment_id]);
      return true;
   }

   
}
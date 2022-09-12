<?php

namespace App\Repository\Promo;

use App\Models\Promo;
use App\Repository\Promo\PromoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PromoRepository implements PromoRepositoryInterface
{
   // use AuthPromoRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Promo $model)
   {
      $this->model = $model;
   }
   public function find(string $code,array $columns=['*'],array $relations=[],array $appends=[]):Promo{
      $model=$this->model->select($columns)->with($relations)->where('code',$code)->first()->append($appends);
      return $model;
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){
      $data= $this->model->select($columns)->with($relations);
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->model->create([
         'code'=>Str::upper($request->code),
         'value'=>$request->value,
         'type'=>$request->type,
         'expired_at'=>$request->expired_at,
         'user_id'=>Auth::user()->id,
      ]);
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      
      $model->code=Str::upper($request->code);
      $model->expired_at=$request->expired_at;
      if(!$model->orders_count){
         $model->type=$request->type;
         $value=$request->type=='rate'?($request->value>100?100:$request->value):$request->value;
         $model->value=$value;
      }
      return $model->save();
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
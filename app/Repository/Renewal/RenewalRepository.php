<?php

namespace App\Repository\Renewal;

use App\Models\Renewal;
use App\Repository\Renewal\RenewalRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RenewalRepository implements RenewalRepositoryInterface
{
   // use AuthRenewalRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Renewal $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Renewal{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){
      $data= $this->model->select($columns)->with($relations)->orderBy('expired_at','asc');
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   public function create(array $data):int{
      $model=$this->model->create([
         'order_detail_id'=>$data['order_detail_id'],
         'user_id'=>$data['user_id'],
         'expired_at'=>$data['expired_at'],
      ]);
      return $model->id; 
   }
   
   public function update(array $data):bool{
      $model=$this->model->find($data['id']);
      $model->update([
         'expired_at'=>isset($data['expired_at'])?$data['expired_at']:$model->expired_at,
         'refused_at'=>isset($data['refused_at'])?$data['refused_at']:null,
      ]);
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
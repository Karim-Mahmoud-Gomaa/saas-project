<?php

namespace App\Repository\Feature;

use App\Models\Feature;
use App\Repository\Feature\FeatureRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FeatureRepository implements FeatureRepositoryInterface
{
   // use AuthFeatureRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Feature $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Feature{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      ->when(isset($filter['search']),function($q) use($filter){
         $q->where('name','like','%'.$filter['search'].'%');
      })
      ->when(isset($filter['service_id']),function($q) use($filter){
         $q->where('service_id',$filter['service_id']);
      });
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->model->create([
         'service_id'=>$request->service_id,
         'description'=>['en'=>$request->description],
      ]);
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id); 
      if ($request->description&&$request->lang) {
         $model->setTranslation('description',$request->lang,$request->description);
         $model->save();
      }
      if (isset($request->packages)) {
         $model->packages()->sync($request->packages);
      }
      
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
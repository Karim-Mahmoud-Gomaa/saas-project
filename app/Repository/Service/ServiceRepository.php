<?php

namespace App\Repository\Service;

use App\Models\Service;
use App\Repository\Service\ServiceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceRepository implements ServiceRepositoryInterface
{
   // use AuthServiceRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Service $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Service{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):Service{
      return $this->model->select($columns)->where('slug', $slug)
      ->with($relations)->first()->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){
      $data= $this->model->select($columns)->with($relations);
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   public function create(Request $request):int{
      $model=new $this->model();
      $model->setTranslation('name','en',$request->name);
      $model->slug=Str::slug($request->name);
      $model->save();
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      $model->setTranslation($request->col,$request->lang,$request->content);
      if ($request->col=='name'&&$request->lang=='en') {
         $model->slug=Str::slug($request->content);
      }
      $model->save();
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
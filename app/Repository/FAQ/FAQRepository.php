<?php

namespace App\Repository\FAQ;

use App\Models\FAQ;
use App\Repository\FAQ\FAQRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FAQRepository implements FAQRepositoryInterface
{
   // use AuthFAQRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(FAQ $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):FAQ{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):FAQ{
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
      $model->setTranslation('answer',$request->lang,$request->answer);
      $model->setTranslation('question',$request->lang,$request->question);
      $model->service_id=$request->service_id;
      $model->save();
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      $model->setTranslation('answer',$request->lang,$request->answer);
      $model->setTranslation('question',$request->lang,$request->question);
      $model->save();
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
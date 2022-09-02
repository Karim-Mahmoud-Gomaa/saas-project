<?php

namespace App\Repository\Term;

use App\Models\Term;
use App\Repository\Term\TermRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TermRepository implements TermRepositoryInterface
{
   // use AuthTermRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Term $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Term{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){
      $data= $this->model->select($columns)->with($relations)->orderBy('months','asc');;
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->model->create(['months'=>$request->months]);
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      return $this->model->find($id)->update(['months'=>$request->months]);
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
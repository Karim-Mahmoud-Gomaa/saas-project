<?php

namespace App\Repository\PageTranslation;

use App\Models\PageTranslation;
use App\Repository\PageTranslation\PageTranslationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PageTranslationRepository implements PageTranslationRepositoryInterface
{
   // use AuthPageTranslationRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(PageTranslation $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):PageTranslation{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      ->when(isset($filter['search']),function($q) use($filter){
         $q->where('name','like','%'.$filter['search'].'%');
      })
      ->when(isset($filter['page_id']),function($q) use($filter){
         $q->where('page_id',$filter['page_id']);
      });
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->model->create(['name'=>$request->name]);
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      
      $model->setTranslation('content',$request->lang,$request->content);
      $model->save();
      
      
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
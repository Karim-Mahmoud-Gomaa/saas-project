<?php

namespace App\Repository\Package;

use App\Models\Package;
use App\Repository\Package\PackageRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Repository\Order\OrderFacade as Order;

class PackageRepository implements PackageRepositoryInterface
{
   // use AuthPackageRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(Package $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Package{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      // ->when(isset($filter['search']),function($q) use($filter){
      //    $q->where('name','like','%'.$filter['search'].'%');
      // })
      ->when(isset($filter['service_id']),function($q) use($filter){
         $q->where('service_id',$filter['service_id']);
      })->orderBy('price','asc');
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   
   public function create(Request $request):int{
      $model=$this->model->create([
         'service_id'=>$request->service_id,
         'repo_path'=>$request->repo_path,
         'price'=>$request->price,
         'name'=>['en'=>$request->name],
      ]);
      if (isset($request->terms)) {
         $model->terms()->sync($request->terms);
      }
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      if (isset($request->name)) {
         $model->setTranslation('name',$request->lang,$request->name);
      }elseif(isset($request->price)){
         if ($model->price!=$request->price) {
            Order::UpdatePackagePrice($id,$request->price);
         }
         $model->price=$request->price;
         $model->is_active=$request->is_active;
         $model->repo_path=$request->repo_path;
      }
      if (isset($request->terms)&&isset($request->discounts)&&count($request->terms)==count($request->discounts)) {
         $data=[];
         foreach ($request->terms as $index=>$term_id) {
            $data[$term_id]=['discount' => $request->discounts[$index]];
         }
         $model->terms()->sync($data);
      }
      $model->save();
      return true;
   }
   
   public function delete(int $id):bool{
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
}
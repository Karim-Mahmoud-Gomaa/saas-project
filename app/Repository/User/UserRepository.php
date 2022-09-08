<?php

namespace App\Repository\User;

use App\Models\User;
use App\Repository\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
   // use AuthUserRepository;
   /**
   * @var Model
   */
   protected $model;
   
   /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
   public function __construct(User $model)
   {
      $this->model = $model;
   }
   public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):User{
      return $this->model->select($columns)->with($relations)->find($id)->append($appends);
   }
   
   public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){
      $data= $this->model->select($columns)->with($relations)
      ->when(isset($filter['email']),function($q) use($filter){
         $q->where('email',$filter['email']);
      });
      
      if($paginate>0){$data=$data->paginate($paginate);}else{$data=$data->get();}
      if($appends){foreach ($data as $value) {$value->append($appends);}}
      return $data;
   }
   
   public function create(Request $request):int{
      $model=$this->model->create([
         'name'=>$request->name,
         'company'=>$request->company,
         'email'=>$request->email,
         'password'=>Hash::make($request->password),
      ]);
      return $model->id; 
   }
   
   public function update(int $id,Request $request):bool{
      $model=$this->model->find($id);
      $model->update([
         'name'=>($request->name)?$request->name:$model->name,
         'email'=>($request->email)?$request->email:$model->email,
         'company'=>($request->company)?$request->company:$model->company,
      ]);
      if ($request->password) {
         $model->update(['password'=>Hash::make($request->password)]);
      }
      return true; 
   }
   
   public function login(Request $request):bool{
      $credentials = $request->only('email', 'password');
      $auth=Auth::attempt($credentials, true);
      return $auth?true:false;
   }
   
   public function  logout($model)
   {
      $model->token()->delete();
      return true;
   }
   
   public function delete(int $id):bool{
      
      $model=$this->model->find($id);
      return ($model->delete())?true:false;
   }
   
   public function followersIds(int $id):array{
      
      $model=$this->model->find($id);
      return $model->followers()->where('is_active',1)->get()->pluck('id')->toArray();
   }
}
<?php

namespace App\Repository\User;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):User;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;
   
    public function login(Request $request):bool;
    public function logout($model);
    
}
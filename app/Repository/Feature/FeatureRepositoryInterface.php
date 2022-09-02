<?php

namespace App\Repository\Feature;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Feature;
use Illuminate\Http\Request;

interface FeatureRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Feature;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
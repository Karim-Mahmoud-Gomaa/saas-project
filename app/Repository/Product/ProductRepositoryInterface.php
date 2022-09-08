<?php

namespace App\Repository\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Package;

interface ProductRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Product;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]);
    public function create(array $data):int;
    public function update(int $id,array $data):bool;
    public function delete(int $id):bool;

}
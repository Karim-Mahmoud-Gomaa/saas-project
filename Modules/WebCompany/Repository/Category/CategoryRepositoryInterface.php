<?php

namespace Modules\WebCompany\Repository\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\WebCompany\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Category;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
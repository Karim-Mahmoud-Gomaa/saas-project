<?php

namespace App\Repository\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Page;
use Illuminate\Http\Request;

interface PageRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Page;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
<?php

namespace App\Repository\PageTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\PageTranslation;
use Illuminate\Http\Request;

interface PageTranslationRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):PageTranslation;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
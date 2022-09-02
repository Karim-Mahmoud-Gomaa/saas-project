<?php

namespace App\Repository\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Service;
use Illuminate\Http\Request;

interface ServiceRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Service;
    public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):Service;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
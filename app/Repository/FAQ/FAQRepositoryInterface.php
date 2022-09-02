<?php

namespace App\Repository\FAQ;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\FAQ;
use Illuminate\Http\Request;

interface FAQRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):FAQ;
    public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):FAQ;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
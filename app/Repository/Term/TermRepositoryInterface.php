<?php

namespace App\Repository\Term;
use App\Models\Term;
use Illuminate\Http\Request;

interface TermRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Term;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
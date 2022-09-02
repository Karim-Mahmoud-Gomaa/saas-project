<?php

namespace App\Repository\Promo;
use App\Models\Promo;
use Illuminate\Http\Request;

interface PromoRepositoryInterface {
    public function find(string $code,array $columns=['*'],array $relations=[],array $appends=[]):Promo;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;


}
<?php

namespace App\Repository\Renewal;
use App\Models\Renewal;
use Illuminate\Http\Request;

interface RenewalRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Renewal;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10);
    public function create(array $data):int;
    public function update(array $data):bool;
    public function delete(int $id):bool;


}
<?php

namespace App\Repository\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Package;

interface OrderRepositoryInterface {
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Order;
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]);
    public function create(Request $request):int;
    public function update(int $id,Request $request):bool;
    public function delete(int $id):bool;
    
    public function UpdatePackagePrice(int $package_id,float $price):bool;
    public function addPackage(Package $package):bool;
    public function getCart():Order;

}
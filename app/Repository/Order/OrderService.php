<?php

namespace App\Repository\Order;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Order\OrderRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;

class OrderService extends Facade
{
    protected $OrderRepository;
    public function __construct(OrderRepositoryInterface $OrderRepository)
    {
        $this->OrderRepository = $OrderRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Order{
        return $this->OrderRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){        
        return $this->OrderRepository->index($columns,$relations,$appends,$paginate,$filter);
    }

    public function create(Request $request):int{
        return $this->OrderRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->OrderRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->OrderRepository->delete($id);
    }

    public function UpdatePackagePrice(int $package_id,float $price):bool{
        return $this->OrderRepository->UpdatePackagePrice($package_id,$price);
    }
    public function addPackage(Package $package):bool{
        return $this->OrderRepository->addPackage($package);
    }
    public function getCart():Order{
        return $this->OrderRepository->getCart();
    }

    
}
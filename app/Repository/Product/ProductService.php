<?php

namespace App\Repository\Product;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Product\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Package;

class ProductService extends Facade
{
    protected $ProductRepository;
    public function __construct(ProductRepositoryInterface $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Product{
        return $this->ProductRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){        
        return $this->ProductRepository->index($columns,$relations,$appends,$paginate,$filter);
    }

    public function create(array $data):int{
        return $this->ProductRepository->create($data);
    }
    
    public function update(int $id,array $data):bool{
        return $this->ProductRepository->update($id,$data);
    }

    public function delete(int $id):bool{
        return $this->ProductRepository->delete($id);
    }
    
}
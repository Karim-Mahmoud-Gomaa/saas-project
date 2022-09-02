<?php

namespace App\Repository\Package;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Package\PackageRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageService extends Facade
{
    protected $PackageRepository;
    public function __construct(PackageRepositoryInterface $PackageRepository)
    {
        $this->PackageRepository = $PackageRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Package{
        return $this->PackageRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){        
        return $this->PackageRepository->index($columns,$relations,$appends,$paginate,$filter);
    }

    public function create(Request $request):int{
        return $this->PackageRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->PackageRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->PackageRepository->delete($id);
    }

    
}
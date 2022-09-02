<?php

namespace App\Repository\Service;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Service\ServiceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceService extends Facade
{
    protected $ServiceRepository;
    public function __construct(ServiceRepositoryInterface $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Service{
        return $this->ServiceRepository->find($id,$columns,$relations,$appends);
    }
    
    public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):Service{
        return $this->ServiceRepository->findBySlug($slug,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->ServiceRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(Request $request):int{
        return $this->ServiceRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->ServiceRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->ServiceRepository->delete($id);
    }

    
}
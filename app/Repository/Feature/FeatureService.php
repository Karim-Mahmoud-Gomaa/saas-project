<?php

namespace App\Repository\Feature;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Feature\FeatureRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureService extends Facade
{
    protected $FeatureRepository;
    public function __construct(FeatureRepositoryInterface $FeatureRepository)
    {
        $this->FeatureRepository = $FeatureRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Feature{
        return $this->FeatureRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){        
        return $this->FeatureRepository->index($columns,$relations,$appends,$paginate,$filter);
    }

    public function create(Request $request):int{
        return $this->FeatureRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->FeatureRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->FeatureRepository->delete($id);
    }

    
}
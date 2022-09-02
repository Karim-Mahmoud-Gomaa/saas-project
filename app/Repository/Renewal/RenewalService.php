<?php

namespace App\Repository\Renewal;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Renewal\RenewalRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Renewal;

class RenewalService extends Facade
{
    protected $RenewalRepository;
    public function __construct(RenewalRepositoryInterface $RenewalRepository)
    {
        $this->RenewalRepository = $RenewalRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Renewal{
        return $this->RenewalRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->RenewalRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(array $data):int{
        return $this->RenewalRepository->create($data);
    }
    
    public function update(array $data):bool{
        return $this->RenewalRepository->update($data);
    }

    public function delete(int $id):bool{
        return $this->RenewalRepository->delete($id);
    }

    
}
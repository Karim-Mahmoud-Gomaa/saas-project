<?php

namespace App\Repository\FAQ;

use \Illuminate\Support\Facades\Facade;
use App\Repository\FAQ\FAQRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQService extends Facade
{
    protected $FAQRepository;
    public function __construct(FAQRepositoryInterface $FAQRepository)
    {
        $this->FAQRepository = $FAQRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):FAQ{
        return $this->FAQRepository->find($id,$columns,$relations,$appends);
    }
    
    public function findBySlug(string $slug,array $columns=['*'],array $relations=[],array $appends=[]):FAQ{
        return $this->FAQRepository->findBySlug($slug,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->FAQRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(Request $request):int{
        return $this->FAQRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->FAQRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->FAQRepository->delete($id);
    }

    
}
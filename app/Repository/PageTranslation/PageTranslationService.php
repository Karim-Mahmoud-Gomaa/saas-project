<?php

namespace App\Repository\PageTranslation;

use \Illuminate\Support\Facades\Facade;
use App\Repository\PageTranslation\PageTranslationRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\PageTranslation;

class PageTranslationService extends Facade
{
    protected $PageTranslationRepository;
    public function __construct(PageTranslationRepositoryInterface $PageTranslationRepository)
    {
        $this->PageTranslationRepository = $PageTranslationRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):PageTranslation{
        return $this->PageTranslationRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10,array $filter=[]){        
        return $this->PageTranslationRepository->index($columns,$relations,$appends,$paginate,$filter);
    }

    public function create(Request $request):int{
        return $this->PageTranslationRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->PageTranslationRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->PageTranslationRepository->delete($id);
    }

    
}
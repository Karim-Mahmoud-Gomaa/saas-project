<?php

namespace App\Repository\Page;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Page\PageRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Page;

class PageService extends Facade
{
    protected $PageRepository;
    public function __construct(PageRepositoryInterface $PageRepository)
    {
        $this->PageRepository = $PageRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Page{
        return $this->PageRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->PageRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(Request $request):int{
        return $this->PageRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->PageRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->PageRepository->delete($id);
    }

    
}
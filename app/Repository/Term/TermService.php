<?php

namespace App\Repository\Term;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Term\TermRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Term;

class TermService extends Facade
{
    protected $TermRepository;
    public function __construct(TermRepositoryInterface $TermRepository)
    {
        $this->TermRepository = $TermRepository;
    }
    
    public function find(int $id,array $columns=['*'],array $relations=[],array $appends=[]):Term{
        return $this->TermRepository->find($id,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->TermRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(Request $request):int{
        return $this->TermRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->TermRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->TermRepository->delete($id);
    }

    
}
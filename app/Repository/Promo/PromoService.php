<?php

namespace App\Repository\Promo;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Promo\PromoRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Promo;

class PromoService extends Facade
{
    protected $PromoRepository;
    public function __construct(PromoRepositoryInterface $PromoRepository)
    {
        $this->PromoRepository = $PromoRepository;
    }
    
    public function find(string $code,array $columns=['*'],array $relations=[],array $appends=[]):Promo{
        return $this->PromoRepository->find($code,$columns,$relations,$appends);
    }
    
    public function index(array $columns=['*'],array $relations=[],array $appends=[],int $paginate=10){        
        return $this->PromoRepository->index($columns,$relations,$appends,$paginate);
    }

    public function create(Request $request):int{
        return $this->PromoRepository->create($request);
    }
    
    public function update(int $id,Request $request):bool{
        return $this->PromoRepository->update($id,$request);
    }

    public function delete(int $id):bool{
        return $this->PromoRepository->delete($id);
    }

    
}
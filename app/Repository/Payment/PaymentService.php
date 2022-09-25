<?php

namespace App\Repository\Payment;

use \Illuminate\Support\Facades\Facade;
use App\Repository\Payment\PaymentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class PaymentService extends Facade
{
    protected $PaymentRepository;
    public function __construct(PaymentRepositoryInterface $PaymentRepository)
    {
        $this->PaymentRepository = $PaymentRepository;
    }
    
    public function GetPaymentMethods(int $user_id):Collection{
        return $this->PaymentRepository->GetPaymentMethods($user_id);
    }
    public function addPaymentMethod(int $user_id,string $paymentMethodId):bool{
        return $this->PaymentRepository->addPaymentMethod($user_id,$paymentMethodId);
    }
    public function deletePaymentMethod(int $user_id,string $paymentMethodId):bool{
        return $this->PaymentRepository->deletePaymentMethod($user_id,$paymentMethodId);
    }
    
    public function Charge(int $user_id,float $money,string $paymentMethodId){
        return $this->PaymentRepository->Charge($user_id,$money,$paymentMethodId);
    }
    
}
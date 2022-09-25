<?php

namespace App\Repository\Payment;

use App\Repository\Payment\PaymentRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User};

class PaymentRepository implements PaymentRepositoryInterface
{

   public function GetPaymentMethods(int $user_id):Collection{
      return User::find($user_id)->paymentMethods();
   }

   public function addPaymentMethod(int $user_id,string $paymentMethodId):bool{
      User::find($user_id)->addPaymentMethod($paymentMethodId);
      return true;
   }

   public function deletePaymentMethod(int $user_id,string $paymentMethodId):bool{
      User::find($user_id)->deletePaymentMethod($paymentMethodId);
      return true;
   }

   public function Charge(int $user_id,float $money,string $paymentMethodId){
      return User::find($user_id)->charge($money*100,$paymentMethodId);
   }
   
  
}
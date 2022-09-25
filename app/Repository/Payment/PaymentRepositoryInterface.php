<?php

namespace App\Repository\Payment;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface PaymentRepositoryInterface {
    public function GetPaymentMethods(int $user_id):Collection;
    public function addPaymentMethod(int $user_id,string $paymentMethodId):bool;
    public function deletePaymentMethod(int $user_id,string $paymentMethodId):bool;
    public function Charge(int $user_id,float $money,string $paymentMethodId);
}
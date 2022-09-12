<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promos';
    protected $guarded = [];
    protected $dates = ['expired_at'];
    // //////////////////////////////////////////////Attributes
    public function getOrdersCountAttribute(){
        return Order::where('promo_id',$this->id)->count();
    }

    // //////////////////////////////////////////////relationships
    public function user()
    {
        return $this->belongsTo(Admin::class,'user_id');
    }
    
}

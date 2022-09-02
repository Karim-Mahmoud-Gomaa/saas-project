<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    
    protected $table = 'order_details';
    public $timestamps =false;  
    protected $guarded = [];
    // //////////////////////////////////////////////relationships
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
}

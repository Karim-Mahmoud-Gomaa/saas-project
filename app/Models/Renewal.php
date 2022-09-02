<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    protected $table = 'renewals';
    public $timestamps =false;  
    protected $guarded = [];
    protected $dates = ['expired_at', 'refused_at'];
    // //////////////////////////////////////////////relationships
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // public function order_detail()
    // {
    //     return $this->belongsTo(OrderDetail::class,'order_detail_id');
    // }
}

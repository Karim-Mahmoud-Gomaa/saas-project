<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    protected $dates = ['expired_at'];
    // //////////////////////////////////////////////Attributes
    // public function getContentAttribute(){}
    
    // //////////////////////////////////////////////relationships
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    
}

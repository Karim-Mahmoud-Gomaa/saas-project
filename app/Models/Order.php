<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $table = 'orders';
    protected $guarded = [];
    
    // //////////////////////////////////////////////Attributes
    public function getPriceAttribute(){
        $total=OrderDetail::where('order_id',$this->id)->get()->sum(function($t){ 
            $price=$t->months * $t->price;
            return $price - ($t->discount * ($price / 100));
        });
        if ($this->promo_id) {
            $promo=Promo::find($this->promo_id);
            if ($promo->type=='rate') {
                $total-=($total/100)*$promo->value;
            }else{
                $total-=$promo->value;
            }
        }
      
        return $total;
    }
    
    
    // //////////////////////////////////////////////relationships
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'order_id');
    }
    public function promo()
    {
        return $this->belongsTo(Promo::class,'promo_id');
    }
}

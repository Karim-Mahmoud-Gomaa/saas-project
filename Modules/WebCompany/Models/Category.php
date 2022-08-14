<?php
namespace Modules\WebCompany\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [];
    public $timestamps =false;  
    // //////////////////////////////////////////////Attributes
    public function getproductsCountAttribute(){
        return 10;
    }
    // //////////////////////////////////////////////Relations
    
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
    public static function boot() {
        parent::boot();
        static::deleting(function($model) { 
            foreach ($model->products as $value) {$value->delete();}
        });
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;
    
    protected $table = 'services';
    protected $guarded = [];
    public $timestamps =false;  
    public $translatable = ['name','keywords','description'];
    // //////////////////////////////////////////////Attributes
    public function getContentAttribute(){
        $content=[];
        $translations=Package::where('service_id',$this->id)->get();
        foreach ($translations as $value) {
            $content[$value->title]=$value->content;
        }
        return $content;
    }
    
    // //////////////////////////////////////////////relationships
    public function packages()
    {
        return $this->hasMany(Package::class,'service_id')->orderBy('price','asc');
    }
    public function active_packages()
    {
        return $this->hasMany(Package::class,'service_id')->where('is_active',true)->orderBy('price','asc');
    }
    public function features()
    {
        return $this->hasMany(Feature::class,'service_id');
    }
    public function faq()
    {
        return $this->hasMany(FAQ::class,'service_id');
    }
    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }
    
}

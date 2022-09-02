<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasTranslations;
    
    protected $table = 'features';
    protected $guarded = [];
    public $timestamps =false;  
    public $translatable = ['description'];

    // //////////////////////////////////////////////relationships
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class,'package_features');
    }
}

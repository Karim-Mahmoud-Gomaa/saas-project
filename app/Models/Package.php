<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Package extends Model
{
    use HasTranslations;

    protected $table = 'packages';
    protected $guarded = [];
    public $timestamps =false;  
    public $translatable = ['name','time'];

    // //////////////////////////////////////////////relationships
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class,'package_features');
    }

    public function terms()
    {
        return $this->belongsToMany(Term::class,'term_packages')->withPivot('discount');
    }
    
}

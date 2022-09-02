<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FAQ extends Model
{
    use HasTranslations;
    
    protected $table = 'faq';
    protected $guarded = [];
    public $timestamps =false;  
    public $translatable = ['question','answer'];

    // //////////////////////////////////////////////relationships
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}

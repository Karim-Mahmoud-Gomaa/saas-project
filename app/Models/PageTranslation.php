<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PageTranslation extends Model
{
    use HasTranslations;

    protected $table = 'page_translations';
    protected $guarded = [];
    public $timestamps =false;
    public $translatable = ['content'];

    // //////////////////////////////////////////////relationships
    public function page()
    {
        return $this->belongsTo(Page::class,'page_id');
    }
}

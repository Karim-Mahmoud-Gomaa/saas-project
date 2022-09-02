<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    protected $table = 'pages';
    protected $guarded = [];
    public $timestamps =false;  
    public $translatable = ['title','keywords','description'];
    // //////////////////////////////////////////////Attributes
    public function getContentAttribute(){
        $content=[];
        $translations=PageTranslation::where('page_id',$this->id)->get();
        foreach ($translations as $value) {
            $content[$value->id]=$value->content;
        }
        return $content;
    }

    // //////////////////////////////////////////////relationships
    public function translations()
    {
        return $this->hasMany(PageTranslation::class,'page_id');
    }
    
}

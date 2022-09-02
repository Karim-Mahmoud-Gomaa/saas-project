<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';
    public $timestamps =false;  
    protected $guarded = [];
    
    // //////////////////////////////////////////////relationships
    public function packages()
    {
        return $this->belongsToMany(Package::class,'term_packages');
    }
}

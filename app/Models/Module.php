<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'version',
        'is_active',
        'uploaded_by',
        'file',
        'real_path',
        'requirement',
        'readme',
        'logo',
    ];

}

<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $table = 'pb_themes';

    protected $fillable = [
        'name',
        'layout',
        'header',
        'footer',
    ];

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\ThemeFactory::new();
    }
}

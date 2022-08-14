<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageBuilderSetting extends Model
{
    use HasFactory;

    protected $table = 'pb_settings';

    protected $fillable = [
        'key',
        'value'
    ];

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\PageBuilderSettingFactory::new();
    }
}

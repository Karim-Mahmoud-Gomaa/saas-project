<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'pb_settings';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\SettingFactory::new();
    }
}

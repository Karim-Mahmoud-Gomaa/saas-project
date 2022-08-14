<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pb_menus";

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the items for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\MenuFactory::new();
    }
}

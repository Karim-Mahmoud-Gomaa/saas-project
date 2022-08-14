<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends Model
{
    use HasFactory;

    protected $table = "pb_menu_items";

    protected $fillable = [
        'menu_id',
        'page_id',
        'title',
        'order',
    ];

    /**
     * Get the menu that owns the MenuItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    /**
     * Get the page that owns the MenuItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\MenuItemFactory::new();
    }
}

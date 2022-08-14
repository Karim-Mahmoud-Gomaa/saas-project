<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pb_pages';

    protected $fillable = [
        'name',
        'slug',
        'title',
        'keywords',
        'description',
        'featured_image',
        'status',
        'is_home',
        'is_404',
    ];

    /**
     * Get all of the pageBlocks for the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blocks()
    {
        return $this->hasMany(PageBlocks::class);
    }

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\PageFactory::new();
    }
}

<?php

namespace Modules\PageBuilder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageBlocks extends Model
{
    use HasFactory;

    protected $table = 'pb_page_blocks';

    protected $fillable = [
        'page_id',
        'order',
        'type',
        'component',
        'data',
    ];

    /**
     * Get the page that owns the PageBlocks
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    protected static function newFactory()
    {
        return \Modules\PageBuilder\Database\factories\PageBlocksFactory::new();
    }
}

<?php

namespace Modules\PageBuilder\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'title'=>$this->title,
            'slug'=>$this->slug,
            'url'=>url($this->slug)
        ];
    }
}

<?php

namespace Modules\PageBuilder\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PageBlockResource extends JsonResource
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
            'page_id' => $this->page_id,
            'order' => $this->order,
            'type' => $this->type,
            'component' => $this->component,
            'data' => $this->data,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}

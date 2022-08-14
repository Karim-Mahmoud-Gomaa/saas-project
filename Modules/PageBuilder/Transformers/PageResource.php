<?php

namespace Modules\PageBuilder\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'slug'=>$this->slug,
            'title'=>$this->title,
            'keywords'=>$this->keywords,
            'description'=>$this->description,
            'featured_image'=>$this->featured_image,
            'status'=>$this->status,
            'is_home' => $this->is_home?true:false,
            'is_404' => $this->is_404?true:false,
            'blocks'=> PageBlockResource::collection($this->whenLoaded('blocks')),
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
            // 'deleted_at' => $this->whenNotNull($this->deleted_at),
        ];
    }
}

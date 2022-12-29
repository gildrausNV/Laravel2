<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class SlopeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    
     public static $wrap='slope';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'mountain'=>new SlopeResource($this->resource->mountain) 
        ];
    }
}

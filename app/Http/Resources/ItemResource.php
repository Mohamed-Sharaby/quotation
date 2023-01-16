<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category->title ?? '',
            'service_id' => $this->service->name ?? '',
//            'quantity' => $this->quantity ?? '',
            'item_price' => $this->item_price ?? '',
            'selling_price' => $this->selling_price ?? '',
            'discount' => $this->discount ?? '',
        ];
    }
}

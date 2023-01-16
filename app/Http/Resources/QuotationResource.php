<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
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
            'date' => $this->date->format('Y-m-d'),
            'created_by' => $this->user->name ?? '',
            'project' => $this->project->name ?? '',
            'version' => $this->version ?? '',
            'status' => $this->status ?? '',
            'notes' => $this->notes ?? '',
            'total' => $this->total . ' AED' ?? '',

            'items' => $this->items->transform(function ($q) {
                return [
                    'id' => $q->id,
                    'item_name' => $q->item->title,
                    'quantity' => $q->quantity,
                    'price' => $q->price
                ];
            })
        ];
    }
}

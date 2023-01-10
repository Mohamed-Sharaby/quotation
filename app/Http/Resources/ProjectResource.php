<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'type' => $this->type,
            'name' => $this->name,
            'size' => $this->size,
            'date' => $this->date,
            'client_ref' => $this->client_ref,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
            'client_contact_id' => $this->client_contact->name,
            'client_id' => $this->client->name,
            'payment_terms' => $this->payment_terms,
        ];
    }
}

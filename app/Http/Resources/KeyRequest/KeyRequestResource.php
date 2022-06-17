<?php

namespace App\Http\Resources\KeyRequest;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class KeyRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "domine" => $this->request_domine,
            "ipaddress" => $this->request_ip,
            "username" => $this->request_username,
            "email" => $this->request_email,
            "product" => ProductResource::make($this->whenLoaded('Product')),
        ];
    }
}

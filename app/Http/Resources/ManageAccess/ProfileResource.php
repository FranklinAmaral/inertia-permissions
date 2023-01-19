<?php

namespace App\Http\Resources\ManageAccess;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable\
     */
    public function toArray($request)
    {
        // dd($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'status_name' => $this->statusName,
            'created_at' => $this->created_at->toDateString()
        ];
    }

}

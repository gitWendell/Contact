<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchedContactCollection extends JsonResource
{
    public function toArray($history)
    {
        return [
            'id' => encrypt($this->id),
            'users_id' => $this->users_id,
            'name' => $this->name,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $this
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'name' => $this->name,
          'email' => $this->email,
          'username' => $this->username,
          'activated' => $this->activated,
          'type' => $this->type,
          'href' => [
            'wedding' => route('wedding.index', $this->id)
          ]
        ];
    }
}

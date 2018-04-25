<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeddingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'wedding_url' => $this->wedding_url,
          'groom_full' => $this->groom_full,
          'groom_nick' => $this->groom_nick,
          'groom_profile' => $this->groom_profile,
          'bride_full' => $this->bride_full,
          'bride_nick' => $this->bride_nick,
          'bride_profile' => $this->bride_profile,
          'wedding_cer' => $this->wedding_cer,
          'wedding_cer_date' => $this->wedding_cer_date,
          'wedding_cer_begin' => $this->wedding_cer_begin,
          'wedding_cer_end' => $this->wedding_cer_end,
          'wedding_cer_place' => $this->wedding_cer_place,
          'wedding_cer_address' => $this->wedding_cer_address,
          'wedding_cer_lat' => $this->wedding_cer_lat,
          'wedding_cer_long' => $this->wedding_cer_long,
          'wedding_rec' => $this->wedding_rec,
          'wedding_rec_date' => $this->wedding_rec_date,
          'wedding_rec_begin' => $this->wedding_rec_begin,
          'wedding_rec_end' => $this->wedding_rec_end,
          'wedding_rec_place' => $this->wedding_rec_place,
          'wedding_rec_address' => $this->wedding_rec_address,
          'wedding_rec_lat' => $this->wedding_rec_lat,
          'wedding_rec_long' => $this->wedding_rec_long,
        ];
    }
}

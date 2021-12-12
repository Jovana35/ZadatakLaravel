<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrijaveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='prijava';
    public function toArray($request)
    {
        //return parent::toArray($request);

            return [
            'id'=>$this->resource->id,
            'kurs'=>$this->resource->kurs,
            'cena'=>$this->resource->cena,
            'user'=>new UserResource($this->resource->user),
            'profesor'=>new ProfesorResource($this->resource->profesor),
            'vrsta prijave'=>new VrstaPrijaveResource($this->resource->vrstaprijave)
            ];
    }
}

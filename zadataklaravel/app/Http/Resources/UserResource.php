<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    //ovo dole pisemo da bi postman znao sa kojim objektom radimo i da ne bi ispisivao data
    public static $wrap='user';
    public function toArray($request)
    {

        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'email'=>$this->resource->email
        ];
    }
}

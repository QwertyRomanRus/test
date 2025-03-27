<?php

namespace App\Http\Common;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseApiResource extends JsonResource
{
    public $additional = ['sfsf'];
//    public function additional(array $data): self
//    {
//        $this->additional = $data;
//
//        return $this;
//    }
}

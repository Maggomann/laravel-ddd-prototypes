<?php

namespace Business\Example\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Example\Domain\Models\User */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'examples' => ExampleResource::collection($this->examples),
        ];
    }
}

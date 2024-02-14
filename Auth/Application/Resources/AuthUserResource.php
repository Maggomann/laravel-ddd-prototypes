<?php

namespace Auth\Application\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\LaravelData\Data;

class AuthUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request|Data $request): array
    {
        return parent::toArray($request);
    }
}

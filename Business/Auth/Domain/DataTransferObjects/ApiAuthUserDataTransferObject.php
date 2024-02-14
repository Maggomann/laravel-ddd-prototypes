<?php

namespace Business\Auth\Domain\DataTransferObjects;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataPipeline;
use Spatie\LaravelData\DataPipes\CastPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\DefaultValuesDataPipe;
use Spatie\LaravelData\DataPipes\MapPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\ValidatePropertiesDataPipe;

class ApiAuthUserDataTransferObject extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $email,
        public ?string $password = null,
        public ?string $repeat_password = null,
        public ?string $token = null,
    ) {
    }

    public static function pipeline(): DataPipeline
    {
        return DataPipeline::create()
            ->into(static::class)
            ->through(MapPropertiesDataPipe::class)
            ->through(CastPropertiesDataPipe::class)
            ->through(DefaultValuesDataPipe::class)
            ->through(ValidatePropertiesDataPipe::class);
    }

    public static function createFromRegistration(array $requestData): self
    {
        $password = bcrypt(Arr::get($requestData, 'password'));

        return new self(
            id: null,
            name: Arr::get($requestData, 'name'),
            email: Arr::get($requestData, 'email'),
            password: $password
        );
    }

    public static function createFromLogin(array $requestData): self
    {
        return new self(
            id: null,
            name: Arr::get($requestData, 'name'),
            email: Arr::get($requestData, 'email'),
            password: Arr::get($requestData, 'password')
        );
    }
}

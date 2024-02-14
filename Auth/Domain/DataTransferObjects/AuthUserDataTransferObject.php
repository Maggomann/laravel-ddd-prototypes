<?php

namespace Auth\Domain\DataTransferObjects;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataPipeline;
use Spatie\LaravelData\DataPipes\CastPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\DefaultValuesDataPipe;
use Spatie\LaravelData\DataPipes\MapPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\ValidatePropertiesDataPipe;

class AuthUserDataTransferObject extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public string $email,
        public string $password,
        public string $repeat_password,
        public ?string $token,
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

    public static function fromRegisterRequest(array $requestAttributes): static
    {
        $args = [
            'name' => Arr::get($requestAttributes, 'name'),
            'email' => Arr::get($requestAttributes, 'email'),
            'password' => bcrypt(Arr::get($requestAttributes, 'password')),
        ];

        return static::from($args);
    }

    public static function fromRegisteredUser(array $requestAttributes): static
    {
        $args = [
            'name' => Arr::get($requestAttributes, 'name'),
            'email' => Arr::get($requestAttributes, 'email'),
            'token' => Arr::get($requestAttributes, 'token'),
        ];

        return static::from($args);
    }
}

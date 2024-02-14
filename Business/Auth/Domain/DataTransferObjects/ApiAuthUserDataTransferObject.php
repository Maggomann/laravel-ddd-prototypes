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
        public ?int $id = null,
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

    public static function fromRegisterRequest(array $args): self
    {
        if (is_array($args[0] ?? null)) {
            $args = $args[0];
        }

        $password = Arr::get($args, 'password');
        $password = bcrypt($password);

        return new self(... [
            'id' => null,
            'name' => Arr::get($args, 'name'),
            'email' => Arr::get($args, 'email'),
            'password' => $password,
            'repeat_password' => null,
            'token' => null,
        ]);
    }

    public static function fromLoginRequest(array $args): static
    {
        if (is_array($args[0] ?? null)) {
            $args = $args[0];
        }

        return new self(... [
            'id' => null,
            'name' => Arr::get($args, 'name'),
            'email' => Arr::get($args, 'email'),
            'password' => Arr::get($args, 'password'),
            'repeat_password' => null,
            'token' => null,
        ]);
    }
}

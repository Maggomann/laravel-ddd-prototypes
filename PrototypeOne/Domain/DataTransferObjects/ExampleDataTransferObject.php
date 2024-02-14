<?php

namespace PrototypeOne\Domain\DataTransferObjects;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataPipeline;
use Spatie\LaravelData\DataPipes\CastPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\DefaultValuesDataPipe;
use Spatie\LaravelData\DataPipes\MapPropertiesDataPipe;
use Spatie\LaravelData\DataPipes\ValidatePropertiesDataPipe;

class ExampleDataTransferObject extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $description,
        public ?int $user_id,
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
}

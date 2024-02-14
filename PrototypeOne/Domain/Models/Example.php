<?php

namespace PrototypeOne\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use PrototypeOne\Domain\States\ExampleState;
use Spatie\ModelStates\HasStates;

/**
 * @property-read ExampleState $state
 */
class Example extends Model
{
    use HasStates;
    use SoftDeletes;

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.PropertyTypeHint.MissingNativeTypeHint
     *
     * @var string
     */
    protected $table = 'examples';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
        'state' => ExampleState::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

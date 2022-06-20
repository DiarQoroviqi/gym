<?php

declare(strict_types=1);

namespace Domain\Contracting\Models;

use Database\Factories\ClientFactory;
use Deviar\LaravelQueryFilter\Filters\Filterable;
use Domain\Contracting\Builders\ClientBuilder;
use Domain\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    use HasUuid;
    use SoftDeletes;

    public $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'comment',
    ];

    public function newEloquentBuilder($query): ClientBuilder
    {
        return new ClientBuilder($query);
    }

    public function contract(): HasOne
    {
        return $this->hasOne(Contract::class, 'client_id');
    }

    protected static function newFactory(): Factory
    {
        return new ClientFactory();
    }
}

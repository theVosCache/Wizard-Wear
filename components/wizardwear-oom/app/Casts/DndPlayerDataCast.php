<?php

namespace App\Casts;

use App\Http\Resources\DndPlayerData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class DndPlayerDataCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (empty($value)) {
            return new DndPlayerData();
        }

        return DndPlayerData::createFromJson($value);
    }

    /**
     * Prepare the given value for storage.
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!$value instanceof DndPlayerData) {
            throw new InvalidArgumentException('Value must be instance of DndPlayerData');
        }

        return json_encode($value);
    }
}

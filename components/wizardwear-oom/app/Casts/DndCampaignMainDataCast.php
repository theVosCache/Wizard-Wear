<?php

declare(strict_types=1);

namespace App\Casts;

use App\Http\Resources\DndCampaignMainData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class DndCampaignMainDataCast implements CastsAttributes
{
    /**
     * Cast the given value.
     * @param array<string, mixed> $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (empty($value)) {
            return new DndCampaignMainData();
        }

        return DndCampaignMainData::createFromJson($value);
    }

    /**
     * Prepare the given value for storage.
     * @param array<string, mixed> $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!$value instanceof DndCampaignMainData) {
            throw new InvalidArgumentException('Value must be instance of DndCampaignMainData');
        }

        return json_encode($value);
    }
}

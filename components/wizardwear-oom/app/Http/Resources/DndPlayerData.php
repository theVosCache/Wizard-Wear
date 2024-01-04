<?php

namespace App\Http\Resources;

use App\Models\Dnd\Potion;
use App\Models\Dnd\Spell;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class DndPlayerData implements JsonSerializable
{
    private Collection $spells;
    private Collection $potions;

    public function __construct()
    {
        $this->spells = Spell::whereNull('uuid')->get();
        $this->potions = Potion::whereNull('uuid')->get();
    }

    public static function createFromJson(string $jsonData): self
    {
        $self = new self();
        $jsonDecoded = json_decode($jsonData, true);

        foreach ($jsonDecoded['spells'] as $spellUuid) {
            $spell = Spell::findByUuid($spellUuid);
            $self->spells->add($spell);
        }
        foreach ($jsonDecoded['potions'] as $potionUuid) {
            $potion = Spell::findByUuid($potionUuid);
            $self->potions->add($potion);
        }

        return $self;
    }

    public function jsonSerialize(): array
    {
        return [
            'spells' => $this->spells->pluck('uuid'),
            'potions' => $this->potions->pluck('uuid'),
        ];
    }
}

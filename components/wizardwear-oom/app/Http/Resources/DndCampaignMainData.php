<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class DndCampaignMainData implements JsonSerializable
{
    public function __construct(
        public array $monsterList = []
    ) {
    }


    public static function createFromJson(string $jsonData): self
    {
        $self = new self();
        $jsonDecoded = json_decode($jsonData, true);

        foreach ($jsonDecoded['monsterList'] as $monsterData) {
            $monster = new DndCampaignMonsterData(
                name: $monsterData['name'],
                monsterType: $monsterData['monsterType'],
                currentHitPoints: $monsterData['currentHitPoints'],
                totalHitPoints: $monsterData['totalHitPoints']
            );

            $self->monsterList[] = $monster;
        }

        return $self;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'monsterList' => $this->monsterList
        ];
    }
}

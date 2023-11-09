<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class DndCampaignMonsterData implements JsonSerializable
{
    public function __construct(
        public string $name,
        public string $monsterType,
        public int $currentHitPoints,
        public int $totalHitPoints,
    ) {
    }

    public function currentHitPointsPercentage(): ?float
    {
        if (!empty($this->totalHitPoints) && $this->totalHitPoints !== 0) {
            return $this->currentHitPoints / $this->totalHitPoints;
        }

        return null;
    }

    public function currentHitPointsColor(): string
    {
        if (!empty($this->currentHitPointsPercentage())) {
            if ($this->currentHitPointsPercentage() > 0.8) {
                return 'bg-success';
            } elseif ($this->currentHitPointsPercentage() > 0.25) {
                return 'bg-warning';
            }
        }

        return 'bg-danger';
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'monsterType' => $this->monsterType,
            'currentHitPoints' => $this->currentHitPoints,
            'totalHitPoints' => $this->totalHitPoints,
        ];
    }
}

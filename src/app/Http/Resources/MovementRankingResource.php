<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovementRankingResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'movement_name' => $this->first()['movement_name'] ?? '',
            'rankings'      => $this->map(fn($ranking) => [
                'user_name' => $ranking['user_name'],
                'value'     => $ranking['value'],
                'position'  => $ranking['position'],
                'date'      => $ranking['date']
            ])->all()
        ];
    }
}

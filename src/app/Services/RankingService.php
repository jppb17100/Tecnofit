<?php

namespace App\Services;

class RankingService
{
    public function calculateRanking($records)
    {
        $ranking = [];
        $lastValue = null;
        $currentPosition = 0;
        $sameValueCount = 0;

        foreach ($records as $index => $record) {
            if ($lastValue !== $record->best_value) {
                $currentPosition = $index + 1 - $sameValueCount;
                $sameValueCount = 0;
            } else {
                $sameValueCount++;
            }

            $ranking[] = [
                'position'  => $currentPosition,
                'user_name' => $record->user_name,
                'value'     => (float)$record->best_value,
                'date'      => $record->record_date
            ];

            $lastValue = $record->best_value;
        }

        return $ranking;
    }
}

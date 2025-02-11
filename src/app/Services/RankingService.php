<?php

namespace App\Services;

use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class RankingService
{
    public function getMovementRanking(Movement $movement): array
    {
        // Log para debug
        Log::info('Movement ID recebido:', ['id' => $movement->id]);

        $records = PersonalRecord::select([
            'movements.name as movement_name',
            'users.name as user_name',
            'personal_records.value',
            'personal_records.date'
        ])
            ->join('movements', 'movements.id', '=', 'personal_records.movement_id')
            ->join('users', 'users.id', '=', 'personal_records.user_id')
            ->where('movements.id', $movement->id) // Alterado para usar movements.id
            ->whereIn('personal_records.id', function($query) use ($movement) {
                $query->select(\DB::raw('MAX(id)'))
                    ->from('personal_records')
                    ->where('movement_id', $movement->id)
                    ->groupBy('user_id')
                    ->havingRaw('value = MAX(value)');
            })
            ->get();

        // Log para debug
        Log::info('Registros encontrados:', ['count' => $records->count()]);
        Log::info('SQL executado:', ['sql' => \DB::getQueryLog()]);

        $rankings = [];
        $position = 1;
        $lastValue = null;
        $lastPosition = 1;

        foreach ($records->sortByDesc('value') as $record) {
            if ($lastValue === $record->value) {
                $currentPosition = $lastPosition;
            } else {
                $currentPosition = $position;
                $lastPosition = $position;
            }

            $rankings[] = [
                'user_name' => $record->user_name,
                'value' => (float)$record->value,
                'position' => $currentPosition,
                'date' => $record->date
            ];

            $lastValue = $record->value;
            $position++;
        }

        var_dump($records);
        die;
        return [
            'movement_name' => $records->first()?->movement_name ?? '',
            'rankings' => $rankings
        ];
    }
}

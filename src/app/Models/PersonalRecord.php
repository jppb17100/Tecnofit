<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonalRecord extends Model
{
    protected $table = 'personal_records';
    public $timestamps = false;

    public function scopeGetRankingByMovement($query, $movementId)
    {
        return $query->select(
            'users.name as user_name',
            DB::raw('MAX(personal_records.value) as best_value'),
            DB::raw('MAX(personal_records.date) as record_date')
        )
            ->join('users', 'users.id', '=', 'personal_records.user_id')
            ->where('movement_id', $movementId)
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('best_value');
    }
}

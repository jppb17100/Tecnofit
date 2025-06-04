<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\PersonalRecord;
use App\Services\RankingService;

class RankingController extends Controller
{

    private $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function index($movementId)
    {

        //teste
        try {
            $movement = Movement::findOrFail($movementId);
            $records = PersonalRecord::getRankingByMovement($movementId)->get();
            $ranking = $this->rankingService->calculateRanking($records);

            return response()->json([
                'movement' => $movement->name,
                'ranking'  => $ranking
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error'   => 'Erro ao buscar ranking',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

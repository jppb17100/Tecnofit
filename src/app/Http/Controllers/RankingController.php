<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovementRankingResource;
use App\Models\Movement;
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
        $movement = Movement::findOrFail($movementId);
        $rankings = $this->rankingService->getMovementRanking($movement);

        return response()->json($rankings);
    }
}

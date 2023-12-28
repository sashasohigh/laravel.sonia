<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function game()
    {
        $randomNumber = random_int(0, 1000);

        $result = $randomNumber % 2 === 0 ? 'Win' : 'Lose';

        $winAmount = 0;
        if ($result == 'Win') {
            if ($randomNumber > 900) {
                $winAmount = 0.7 * $randomNumber;
            } elseif ($randomNumber > 600) {
                $winAmount = 0.5 * $randomNumber;
            } elseif ($randomNumber > 300) {
                $winAmount = 0.3 * $randomNumber;
            } else {
                $winAmount = 0.1 * $randomNumber;
            }
        }

        $history = Game::create([
            'result' => $result,
            'random_number' => $randomNumber,
            'win_amount' => $winAmount,
            'user_id' => Auth()->user()->id,
        ]);

        $data = [
            'result' => $result,
            'randomNumber' => $randomNumber,
            'winAmount' => $winAmount,
        ];

        return view('components.random_result', compact('data'))->render();
    }

    public function history()
    {
        $history = Auth()->user()->latestHistory;
        return view('components.table_history', compact('history'))->render();
    }
}

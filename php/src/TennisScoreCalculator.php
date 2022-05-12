<?php

namespace TennisKata;

class TennisScoreCalculator {

    public function score(int $player1Points, int $player2Points): string
    {
        $score = '';

        if ($player1Points === 4) {
            $score = 'Player one win match';
        }

        if ($player1Points >= 3 && $player2Points >= 3) {
            $score = $this->advantageStage($player1Points, $player2Points);
        }

        return $score;

    }

    private function advantageStage(int $player1Points, int $player2Points): string
    {
        if (($player1Points - $player2Points) >= 2) {
            return 'Player one win match';
        }

        if (($player2Points - $player1Points) >= 2) {
            return 'Player two win match';
        }

        if (($player1Points - $player2Points) == 1) {
            return 'Player one advantage';
        }

        if (($player2Points - $player1Points) == 1) {
            return 'Player two advantage';
        }

        return '';
    }

}

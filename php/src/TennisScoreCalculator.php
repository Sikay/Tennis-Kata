<?php

namespace TennisKata;

class TennisScoreCalculator {

    public function score(int $player1Points, int $player2Points): string
    {
        $score = '';

        if ($player1Points === 4) {
            $score = 'Player one win match';
        }

        if ($player1Points === 4 && $player2Points === 3) {
            $score = 'Player one advantage';
        }

        if ($player1Points >= 3 && $player2Points >= 3 && ($player1Points - $player2Points) >= 2) {
            $score = 'Player one win match';
        }

        if ($player1Points >= 3 && $player2Points >= 3 && ($player2Points - $player1Points) >= 2) {
            $score = 'Player two win match';
        }

        return $score;
    }

}

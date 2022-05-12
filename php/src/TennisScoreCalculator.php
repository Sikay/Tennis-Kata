<?php

namespace TennisKata;

class TennisScoreCalculator {

    public function score(int $player1Points, int $player2Points): string
    {
        $score = '';

        if ($player1Points === 4) {
            $score = 'Player one win match';
        }

        return $score;
    }

}

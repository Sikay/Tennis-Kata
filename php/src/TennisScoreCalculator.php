<?php

namespace TennisKata;

class TennisScoreCalculator {

    private int $player1Points;
    private int $player2Points;

    public function __construct(int $player1Points, int $player2Points)
    {
        $this->player1Points = $player1Points;
        $this->player2Points = $player2Points;
    }

    public function score(): string
    {
        if ($this->hasAdvantage()) {
            return $this->playerWithHighestScore() . ' advantage';
        }

        if ($this->hasWinner()) {
            return $this->playerWithHighestScore() . ' win match';
        }

        return 'Player one: love | Player two: 15';
    }

    private function hasAdvantage(): bool
    {
        if ($this->isAdvantageStage() && abs($this->player1Points - $this->player2Points) == 1) {
            return true;
        }

        return false;
    }

    private function isAdvantageStage(): bool
    {
        if ($this->player1Points >= 3 && $this->player2Points >= 3) {
            return true;
        }
        return false;
    }

    private function hasWinner(): string
    {

        if (($this->player1Points >= 4 || $this->player2Points >= 4) && abs($this->player1Points - $this->player2Points) >= 2) {
            return true;
        }

        return false;
    }

    private function playerWithHighestScore(): string
    {
        if ($this->player1Points > $this->player2Points) {
            return 'Player one';
        } else {
            return 'Player two';
        }
    }

}

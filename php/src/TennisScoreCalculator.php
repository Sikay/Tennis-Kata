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
        $score = '';

        if ($this->player1Points >= 3 && $this->player2Points >= 3) {
            $score = $this->advantageStage($this->player1Points, $this->player2Points);
        }

        if (($this->player1Points >= 4 || $this->player2Points >= 4) && empty($score)) {
            $score = $this->hasWinner($this->player1Points, $this->player2Points);
        }

        return $score;
    }

    private function advantageStage(int $player1Points, int $player2Points): string
    {
        if (($player1Points - $player2Points) == 1) {
            return 'Player one advantage';
        }

        if (($player2Points - $player1Points) == 1) {
            return 'Player two advantage';
        }

        return '';
    }

    private function hasWinner(int $player1Points, int $player2Points): string
    {

        if (($player1Points - $player2Points) >= 2) {
            return 'Player one win match';
        }

        if (($player2Points - $player1Points) >= 2) {
            return 'Player two win match';
        }

        return '';
    }

}

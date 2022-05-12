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

        if ($this->hasDeuce()) {
            return 'Deuce';
        }

        return 'Player one: ' . $this->translatePointToScore($this->player1Points) .
                ' | Player two: ' . $this->translatePointToScore($this->player2Points);
    }

    private function hasAdvantage(): bool
    {
        return $this->isAdvantageStage() && abs($this->player1Points - $this->player2Points) == 1;
    }

    private function isAdvantageStage(): bool
    {
        return $this->player1Points >= 3 && $this->player2Points >= 3;
    }

    private function hasWinner(): string
    {
        return ($this->player1Points >= 4 || $this->player2Points >= 4) && abs($this->player1Points - $this->player2Points) >= 2;
    }

    private function hasDeuce(): bool
    {
        return $this->player1Points >= 3 && $this->player2Points === $this->player1Points;
    }

    private function playerWithHighestScore(): string
    {
        return $this->player1Points > $this->player2Points ? 'Player one' : 'Player two';
    }

    private function translatePointToScore(int $points): string
    {
        $pointToScore = [
            0 => 'love',
            1 => '15',
            2 => '30',
            3 => '40',
        ];

        $translate = '';

        foreach ($pointToScore as $point => $score) {
            if ($points === $point) {
                $translate = $score;
            }
        }

        return $translate;
    }

}

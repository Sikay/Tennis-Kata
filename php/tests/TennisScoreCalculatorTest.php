<?php

namespace TennisKata\Test;

use TennisKata\TennisScoreCalculator;
use PHPUnit\Framework\TestCase;

class TennisScoreCalculatorTest extends TestCase
{
    /** @test */
    public function should_player_win_when_make_four_points()
    {
        $tennisScoreCalculator = new TennisScoreCalculator();
        $this->assertTrue($tennisScoreCalculator->score(4, 0) === 'Player one win match');
    }
}

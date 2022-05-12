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

    /** @test */
    public function should_player_not_win_when_make_four_points_and_opponent_have_3_point()
    {
        $tennisScoreCalculator = new TennisScoreCalculator();
        $this->assertTrue($tennisScoreCalculator->score(4, 3) === 'Player one advantage');
    }

    /** @test */
    public function should_player_one_win_when_make_two_more_point_than_opponent_in_advantage_stage()
    {
        $tennisScoreCalculator = new TennisScoreCalculator();
        $this->assertTrue($tennisScoreCalculator->score(5, 3) === 'Player one win match');
    }
}

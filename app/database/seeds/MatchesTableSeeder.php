<?php

use  GamingCalendar\models\Match;

/**
 * Class MatchesTableSeeder
 */
class MatchesTableSeeder extends Seeder
{
    public function run()
    {
        Match::create(
            array(
                'broadcast_id' => '0',
                'team_a' => '1',
                'team_b' => '2'
            )
        );
    }
}

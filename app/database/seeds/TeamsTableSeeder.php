<?php

use  GamingCalendar\models\Team;

/**
 * Class TeamsTableSeeder
 */
class TeamsTableSeeder extends Seeder
{
    public function run()
    {

        Team::create(
            array(
                'name' => 'Fnatic',
                'url'   => 'http://google.com'
            )
        );

        Team::create(
            array(
                'name' => 'Codeception Test',
                'url'   => 'http://google.com'
            )
        );

    }
}

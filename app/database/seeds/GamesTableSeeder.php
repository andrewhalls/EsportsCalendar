<?php

use  GamingCalendar\models\Game;

/**
 * Class GamesTableSeeder
 */
class GamesTableSeeder extends Seeder
{
    public function run()
    {
        Game::create(
            array(
                'name'  => 'Counter Strike: Global Offensive',
                'url'   => 'http://googgle.com'
            )
        );
        Game::create(
            array(
                'name'  => 'Starcraft 2',
                'url'   => 'http://googgle.com'
            )
        );
    }
}

<?php

use  GamingCalendar\models\Broadcast;

/**
 * Class BroadcastsTableSeeder
 */
class BroadcastsTableSeeder extends Seeder
{
    public function run()
    {
        Broadcast::create([
            'title' => 'EMS One Katowice',
            'game_id' => 1,
            'channel_id' => 1,
            'description' => 'Yolo Broadcast'
        ]);
    }
}

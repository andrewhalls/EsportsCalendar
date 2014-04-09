<?php

$name = 'Codeception United';
$url = 'http://google.com';

$I = new TestGuy($scenario);
$I->wantTo('View a Team');
$id = $I->haveRecord('team', array('name' => 'Team Codeception', 'url' => 'http://codeception.com'));
$I->amOnPage("/admin/teams/$id");
$I->see('Edit Team', 'btn');
$I->see('Delete Team', 'btn');
$I->see('Team - ' . $name, 'h1');
$I->see($name);
$I->see($url);

<?php

$name = 'Codeception Team';
$url = 'http://codeception.com';

$I = new TestGuy($scenario);
$I->wantTo('Create A New Team');
AdminTeamPage::of($I)
    ->createTeam($name, $url);
$I->see('Team Created');
$I->see($url);
$I->see($name);

<?php

$name = 'Codeception United';
$url = 'http://google.com';

$I = new TestGuy($scenario);
$I->wantTo('View a Team');
$id = $I->haveRecord('team', array('name' => $name, 'url' => $url));
$I->amOnPage("/admin/teams/$id");
$I->see('Edit Team');
$I->see('Delete Team');
$I->see('Team - ' . $name, 'h3');
$I->see($name);
$I->see($url);

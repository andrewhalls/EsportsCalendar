<?php

$name = 'Codeception United';
$url = 'http://google.com';

$I = new TestGuy($scenario);
$I->wantTo('Edit a Team');
$id = $I->haveRecord('team', array('name' => 'Team Codeception', 'url' => 'http://codeception.com'));
$I->amOnPage("/admin/teams/$id/edit");
$I->see('Edit Team', 'h1');
$I->fillField('#name', $name);
$I->fillField('#url', $url);
$I->click('Update');
$I->seeCurrentUrlEquals('/admin/teams');
$I->see('Team Updated');
$I->see($name);
$I->see($url);

<?php

$I = new TestGuy($scenario);
$I->amOnPage('/admin/games');
$I->wantTo('See a list of games');
$I->see('All Games');

<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->amOnPage('/admin/matches');
$I->wantTo('See a list of broadcasts');
$I->see('All Matches');

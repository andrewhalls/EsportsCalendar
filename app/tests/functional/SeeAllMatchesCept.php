<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->amOnPage('/admin/matches');
$I->wantTo('See a list of matches');
$I->see('All Matches');

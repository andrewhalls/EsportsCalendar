<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->amOnPage('/admin/teams');
$I->wantTo('See a list of teams');
$I->see('All Teams');

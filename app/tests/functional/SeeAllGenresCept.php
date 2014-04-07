<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->amOnPage('/admin/genres');
$I->wantTo('See a list of genres');
$I->see('All Genres');

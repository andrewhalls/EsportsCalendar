<?php

$I = new TestGuy($scenario);
$I->amOnPage('/admin/broadcasts');
$I->wantTo('See a list of broadcasts');
$I->see('All Broadcasts');

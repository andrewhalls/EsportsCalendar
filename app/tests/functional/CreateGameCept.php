<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Game');
AdminGamePage::of($I)
    ->createGame('Test Games', 'URL');
$I->see('Successfully Created Game');

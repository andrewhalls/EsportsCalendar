<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Game');
AdminGanePage::of($I)
    ->createGame('Test Games', 'URL');
$I->see('Successfully Created Game');
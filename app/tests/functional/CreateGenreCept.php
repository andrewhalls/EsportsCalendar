<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Genre');
AdminGenrePage::of($I)
    ->createGenre('Team A');
$I->see('Successfully Created Genre');

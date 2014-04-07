<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Match Without A Map');
AdminMatchPage::of($I)
    ->createMatch('Team A', 'Team B', 'Starts At', 'Ends At');
$I->see('Successfully Created Match');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Match With A Map');
AdminMatchPage::of($I)
    ->createMatch('Team A', 'Team B', 'Starts At', 'Ends At', 'Map');
$I->see('Successfully Created Match');

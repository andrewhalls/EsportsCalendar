<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Channel');
AdminBroadcastPage::of($I)
    ->createBroadcast('Test Channel', 'URL', 'English');
$I->see('Successfully Created Channel');
<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('create a new broadcast');
AdminBroadcastPage::of($I)
    ->createBroadcast('Test Broadcast', 2, 1);
$I->see('Successfully Created Broadcast');
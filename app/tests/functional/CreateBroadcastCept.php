<?php

$I = new TestGuy($scenario);
$I->wantTo('create a new broadcast');
AdminBroadcastPage::of($I)
    ->createBroadcast('Test Broadcast', 2);
$I->seeCurrentUrlEquals('/admin/broadcasts');
$I->see('Broadcast Created');

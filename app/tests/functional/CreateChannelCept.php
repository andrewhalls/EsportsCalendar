<?php
$scenario->group('admin');

$I = new TestGuy($scenario);
$I->wantTo('Create A New Channel');
AdminChannelPage::of($I)
    ->createChannel('Test Channel', 'URL', 'English');
$I->see('Successfully Created Channel');

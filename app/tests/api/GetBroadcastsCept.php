<?php
$I = new ApiGuy($scenario);
$I->wantTo('get a list of broadcasts');
$I->sendGet('/broadcasts');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"title":"EMS One Katowice"');
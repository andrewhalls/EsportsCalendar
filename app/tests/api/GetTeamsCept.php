<?php
$I = new ApiGuy($scenario);
$I->wantTo('get a list of teams');
$I->sendGet('/teams');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"name":"Codeception Test"');

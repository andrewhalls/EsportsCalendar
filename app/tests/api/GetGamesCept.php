<?php

$id = 1;
$gameName = 'Counter Strike: Global Offensive';

$I = new ApiGuy($scenario);
$I->wantTo('get a list of matches');
$I->sendGet('/games');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"id":'.$id.'');
$I->seeResponseContains('"name":"'.$gameName.'"');

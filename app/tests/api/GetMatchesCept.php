<?php

$id = 1;
$homeTeamId = 1;
$awayTeamId = 2;

$I = new ApiGuy($scenario);
$I->wantTo('get a list of matches');
$I->sendGet('/matches');
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"id":'.$id.'');
$I->seeResponseContains('"team_a":'.$homeTeamId);
$I->seeResponseContains('"team_b":'.$awayTeamId);

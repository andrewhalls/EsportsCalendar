<?php
$id = 2;
$name = 'Codeception United';

$I = new ApiGuy($scenario);
$I->wantTo('get an existing team');
$I->sendGet('/teams/'.$id);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"id":'.$id.'');
$I->seeResponseContains('"name":"'.$name.'"');

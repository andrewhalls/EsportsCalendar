<?php
$id = 1;
$name = 'EMS One Katowice';

$I = new ApiGuy($scenario);
$I->wantTo('get an existing broadcast');
$I->sendGet('/broadcasts/'.$id);
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContains('"id":'.$id.'');
$I->seeResponseContains('"title":"'.$name.'"');

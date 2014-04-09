<?php

/**
 * Class AdminTeamPage
 */
class AdminTeamPage
{
    // include url of current page
    const URL = '/admin/teams';

    public static function route($param)
    {
        return static::URL.$param;
    }

    /**
     * @var TestGuy;
     */
    protected $testGuy;

    public function __construct(TestGuy $I)
    {
        $this->testGuy = $I;
    }

    public static function of(TestGuy $I)
    {
        return new static($I);
    }

    public function createTeam($name, $url)
    {

        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add New Team');
        $I->fillField('#name', $name);
        $I->fillField('#url', $url);
        $I->click('#create-team');

        return $this;
    }
}

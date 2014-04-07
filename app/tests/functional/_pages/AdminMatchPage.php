<?php

/**
 * Class AdminBroadcastPage
 */
class AdminMatchPage
{
    // include url of current page
    const URL = '/admin/matches';

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
    public function createMatch($home_team, $away_team, $start_at, $end_at, $map = null)
    {
        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add new match');
        $I->fillField('#home_team', $home_team);
        $I->fillField('#away_team', $away_team);
        $I->fillField('#starts_at', $starts_at);
        $I->fillField('#ends_at', $ends_at);

        if ($map != null) {
            $I->fillField('#map', $map);
        }

        $I->click('Submit');

        return $this;
    }
}

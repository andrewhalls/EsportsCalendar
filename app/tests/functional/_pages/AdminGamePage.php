<?php

/**
 * Class AdminBroadcastPage
 */
class AdminGamePage
{
    // include url of current page
    const URL = '/admin/games';

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

    public function createGame($name, $url)
    {
        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add New Game');
        $I->fillField('#name', $name);
        $I->fillField('#url', $url);
        $I->click('Submit');

        return $this;
    }
}

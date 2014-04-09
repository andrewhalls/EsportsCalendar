<?php

/**
 * Class AdminBroadcastPage
 */
class AdminGenrePage
{
    // include url of current page
    const URL = '/admin/genre';

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

    public function createGenre($name)
    {
        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add New Genre');
        $I->fillField('#title', $name);
        $I->click('Submit');

        return $this;
    }
}

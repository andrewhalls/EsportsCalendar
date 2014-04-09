<?php

/**
 * Class AdminBroadcastPage
 */
class AdminChannelPage
{
    // include url of current page
    const URL = '/admin/channel';

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

    public function createChannel($name, $url, $language)
    {
        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add New Channel');
        $I->fillField('#title', $name);
        $I->fillField('#url', $url);
        $I->fillField('#language:', $language);
        $I->click('Submit');

        return $this;
    }
}

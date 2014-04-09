<?php

/**
 * Class AdminBroadcastPage
 */
class AdminBroadcastPage
{
    // include url of current page
    const URL = '/admin/broadcasts';

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

    public function createBroadcast($title, $game = 'Codeception Game', $start_at = null, $end_at = null, $description = 'Codeception Description Broadcast')
    {
        if ($start_at == null) {
            $start_at = '2013-01-01 00:00:01';
        }

        if ($end_at == null) {
            $end_at = '2013-01-01 00:10:01';
        }

        $I = $this->testGuy;

        $I->amOnPage(self::URL);
        $I->click('Add New Broadcast');
        $I->fillField('#title', $title);
        $I->selectOption('form select[name=game_id]', 2);
        $I->fillField('#start_at', $title);
        $I->fillField('#end_at', $title);
        $I->fillField('#description', $description);
        $I->click('#create-broadcast');

        return $this;
    }
}

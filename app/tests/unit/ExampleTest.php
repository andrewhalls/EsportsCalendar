<?php
use Codeception\Util\Stub;
use Carbon\Carbon;

class BroadcastTest extends \Codeception\TestCase\Test
{
   /**
    * @var \CodeGuy
    */
    protected $codeGuy;

    protected function _before()
    {
        $this->broadcast = new GamingCalendar\models\Broadcast();
    }

    protected function _after()
    {
    }

    // tests
    public function testIsActive()
    {
        $this->broadcast->starts_at = Carbon::createFromDate(1975, 5, 21);
        $this->broadcast->ends_at = Carbon::createFromDate(1975, 5, 22);
        $this->assertFalse($this->broadcast->isActive());
    }
}

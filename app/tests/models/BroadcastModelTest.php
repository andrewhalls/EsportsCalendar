<?php

/**
 * Class UserControllerTest
 */
class BroadcastModelTest extends TestCase
{

    public function setUp()
    {

        // Call the parent setup method
        parent::setUp();

        $this->model = new GamingCalendar\models\Broadcast();

    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Test the two basic user types
     *
     */
    public function testIsLive()
    {

        $this->model->end_date = new DateTime("2 months ago");
        $this->assertTrue($this->model->isCompleted());
    }
}

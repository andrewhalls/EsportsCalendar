<?php

/**
 * Class UserControllerTest
 */
class GameControllerTest extends TestCase
{

    public function setUp()
    {

        // Call the parent setup method
        parent::setUp();

        $this->user = Mockery::mock('Univemba\Models\User\User');

        App::instance('Univemba\Models\User\User', $this->user);

        $this->repository = new EloquentUser($this->user);

    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * Test the two basic user types
     *
     */
    public function testBasicUserTypes()
    {
        $this->assertTrue(Sentry::getUser() == null, 'User should not be logged in initially.');

        $admin = Sentry::findUserByLogin($this->adminEmail);
        $this->assertTrue($admin != null, 'Admin account not found.');

        $user = Sentry::findUserByLogin($this->userEmail);
        $this->assertTrue($user != null, 'User account not found.');

        Sentry::setUser($user);
        $this->assertTrue(Sentry::check(), 'User not logged in.');

        Sentry::setUser($admin);
        $this->assertTrue(Sentry::check(), 'Admin not logged in.');

        Sentry::logout();
    }
}

<?php

use Behat\Behat\Context\BehatContext;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//
require_once 'RestContext.php';

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param   array   $parameters     context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        require __DIR__.'/../../../../vendor/autoload.php';
        require __DIR__.'/../../../../bootstrap/start.php';
        Artisan::call('migrate');
        Artisan::call('db:seed');

        // Initialize your context here
        $this->useContext('RestContext', new RestContext($parameters));
    }
}

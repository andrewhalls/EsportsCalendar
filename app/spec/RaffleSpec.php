<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class TestSpec
 * @package spec
 */
class RaffleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Raffle');
    }
}

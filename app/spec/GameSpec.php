<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GameSpec
 * @package spec
 */
class GameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Game');
    }
}

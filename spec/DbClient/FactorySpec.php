<?php

namespace spec\Aggrego\Neo4jEventConsumer\DbClient;

use Aggrego\Neo4jEventConsumer\DbClient\Factory;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Factory::class);
    }
}

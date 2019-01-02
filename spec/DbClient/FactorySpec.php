<?php

namespace spec\Aggrego\Neo4jIntegration\DbClient;

use Aggrego\Neo4jIntegration\DbClient\Factory;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Factory::class);
    }
}

<?php
/**
 *
 * This file is part of the Aggrego.
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace spec\Aggrego\Neo4jIntegration\Api\Command\CreateNode;

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\Neo4jIntegration\Api\Command\CreateNode\Command;
use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('test', []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Command::class);
        $this->shouldHaveType(CommandConsumer::class);
    }

    function it_should_have_node_name(): void
    {
        $this->getNodeName()->shouldBeString();
    }

    function it_should_have_data(): void
    {
        $this->getData()->shouldBeArray();
    }
}

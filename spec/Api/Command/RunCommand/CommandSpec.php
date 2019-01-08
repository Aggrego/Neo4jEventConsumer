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

namespace spec\Aggrego\Neo4jIntegration\Api\Command\RunCommand;

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\Neo4jIntegration\Api\Command\RunCommand\Command;
use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('test', ['test']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Command::class);
        $this->shouldHaveType(CommandConsumer::class);
    }

    function it_should_have_query(): void
    {
        $this->getCypherQuery()->shouldBeString();
    }
    function it_should_have_parameters(): void
    {
        $this->getParameters()->shouldBeArray();
    }
}

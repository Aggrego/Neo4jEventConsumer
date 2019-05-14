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

declare(strict_types = 1);

namespace spec\Aggrego\Neo4jIntegration\Api\Command\RunCommand;

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\Neo4jIntegration\Api\Command\RunCommand\Command;
use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior
{
    public const UUID = '7835a2f1-65c4-4e05-aacf-2e9ed950f5f2';

    function let()
    {
        $this->beConstructedWith(self::UUID, 'test', ['test']);
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

    function it_serialize()
    {
        $this->serialize()->shouldBeString();
    }

    function it_should_unserialize()
    {
        $this->unserialize(
            json_encode(
                [
                    'uuid' => '7835a2f1-65c4-4e05-aacf-2e9ed950f5f2',
                    'name' => Command::NAME,
                    'query' => 'test',
                    'parameters' => [],
                ]
            )
        )->shouldBeAnInstanceOf(Command::class);
    }
}

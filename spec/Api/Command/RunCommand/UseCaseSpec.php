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

use Aggrego\Neo4jIntegration\Api\Command\RunCommand\Command;
use Aggrego\Neo4jIntegration\Api\Command\RunCommand\Response;
use Aggrego\Neo4jIntegration\Api\Command\RunCommand\UseCase;
use GraphAware\Neo4j\Client\Client;
use PhpSpec\ObjectBehavior;

class UseCaseSpec extends ObjectBehavior
{
    function let(Client $client): void
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(UseCase::class);
    }

    function it_should_handle_command()
    {
        $this->handle(new Command('test'))->shouldBeAnInstanceOf(Response::class);
    }
}

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

use Aggrego\CommandConsumer\Response as CommandConsumerResponse;
use Aggrego\Neo4jIntegration\Api\Command\CreateNode\Response;
use PhpSpec\ObjectBehavior;

class ResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Response::class);
        $this->shouldHaveType(CommandConsumerResponse::class);
    }
}

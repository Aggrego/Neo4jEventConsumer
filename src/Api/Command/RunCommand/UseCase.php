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

namespace Aggrego\Neo4jIntegration\Api\Command\RunCommand;

use GraphAware\Neo4j\Client\Client;

class UseCase
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(Command $command): void
    {
        $this->client->run($command->getCypherQuery(), $command->getParameters());
    }
}

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

namespace Aggrego\Neo4jIntegration\Api\Command\RunCommand;

use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\Exception\Neo4jExceptionInterface;

class UseCase
{
    /** @var Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(Command $command): Response
    {
        try {
            $this->client->run($command->getCypherQuery(), $command->getParameters());
        } catch (Neo4jExceptionInterface $e) {
            return Response::fail($e->getMessage());
        }

        return Response::ok();
    }
}

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

namespace Aggrego\Neo4jIntegration\Api\Command\CreateNode;

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\CommandConsumer\Name;
use Assert\Assertion;

class Command implements CommandConsumer
{
    private const NAME = 'neo4j_integration.create_node';

    /** @var string */
    private $nodeName;

    /** @var array */
    private $data;

    public function __construct(string $nodeName, array $data)
    {
        Assertion::notEmpty($nodeName);
        $this->nodeName = $nodeName;
        $this->data = $data;
    }

    public function getName(): Name
    {
        return new Name(self::NAME);
    }

    public function getPayload(): array
    {
        return [
            'node_name' => $this->nodeName,
            'data' => $this->data
        ];
    }

    public function getNodeName(): string
    {
        return $this->nodeName;
    }

    public function getData(): array
    {
        return $this->data;
    }
}

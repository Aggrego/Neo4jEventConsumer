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

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\CommandConsumer\Name;
use Assert\Assertion;

class Command implements CommandConsumer
{
    private const NAME = 'neo4j_integration.run_command';

    /** @var string */
    private $query;

    public function __construct(string $query)
    {
        Assertion::notEmpty($query);
        $this->query = $query;
    }

    public function getName(): Name
    {
        return new Name(self::NAME);
    }

    public function getPayload(): array
    {
        return [
            'query' => $this->query
        ];
    }

    public function getCypherQuery(): string
    {
        return $this->query;
    }
}

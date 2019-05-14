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

use Aggrego\CommandConsumer\Command as CommandConsumer;
use Aggrego\CommandConsumer\Name;
use Aggrego\CommandConsumer\Uuid;
use Assert\Assertion;

class Command implements CommandConsumer
{
    public const NAME = 'neo4j_integration.run_command';

    /** @var Uuid */
    private $uuid;

    /** @var string */
    private $query;

    /** @var array */
    private $parameters;

    public function __construct(string $uuid, string $query, array $parameters = [])
    {
        Assertion::notEmpty($query);
        $this->uuid = new Uuid($uuid);
        $this->query = $query;
        $this->parameters = $parameters;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): Name
    {
        return new Name(self::NAME);
    }

    public function getCypherQuery(): string
    {
        return $this->query;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function serialize()
    {
        return json_encode(
            [
                'uuid' => $this->uuid->getValue(),
                'name' => self::NAME,
                'query' => $this->query,
                'parameters' => $this->parameters
            ]
        );
    }

    public function unserialize($serialized): self
    {
        $json = json_decode($serialized, true);
        Assertion::keyExists($json, 'uuid');
        Assertion::keyExists($json, 'name');
        Assertion::eq($json['name'], self::NAME);
        Assertion::keyExists($json, 'query');
        Assertion::keyExists($json, 'parameters');

        return new self(
            $json['uuid'],
            $json['query'],
            $json['parameters']
        );
    }
}

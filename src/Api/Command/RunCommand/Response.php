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

use Aggrego\CommandConsumer\Name;
use Aggrego\CommandConsumer\Response as CommandConsumerResponse;

class Response implements CommandConsumerResponse
{
    private const NAME = 'neo4j_integration.create_node.response';

    private const SUCCESS_KEY = 'success';

    /** @var array */
    private $payload;

    private function __construct(array $data)
    {
        $this->payload = $data;
    }

    public function getName(): Name
    {
        return new Name(self::NAME);
    }

    public static function ok(): self
    {
        return new self(
            [
                self::SUCCESS_KEY => true
            ]
        );
    }

    public static function fail(string $reason): self
    {
        return new self(
            [
                self::SUCCESS_KEY => false,
                'error' => $reason
            ]
        );
    }

    public function isSuccess(): bool
    {
        return $this->payload[self::SUCCESS_KEY];
    }

    public function getPayload(): array
    {
        return $this->payload;
    }
}

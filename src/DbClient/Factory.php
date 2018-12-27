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

namespace Aggrego\Neo4jEventConsumer\DbClient;

use Assert\Assertion;
use GraphAware\Neo4j\Client\Client;
use GraphAware\Neo4j\Client\ClientBuilder;

class Factory
{
    private $defaultKeyAlias;

    public function __construct($defaultKeyAlias = 'default')
    {
        $this->defaultKeyAlias = $defaultKeyAlias;
    }

    public function factory(array $connections): Client
    {
        Assertion::keyExists($connections, $this->defaultKeyAlias);
        $clientBuilder = ClientBuilder::create();

        foreach ($connections as $key => $connectionUrl) {
            $clientBuilder->addConnection($key, $connectionUrl);
        }
        $clientBuilder->setMaster($this->defaultKeyAlias);
        return $clientBuilder->build();
    }
}

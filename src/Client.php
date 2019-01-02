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

namespace Aggrego\Neo4jIntegration;

use Aggrego\EventConsumer\Client as DomainClient;
use Aggrego\EventConsumer\Event as ConsumedEvent;
use Aggrego\EventConsumer\Exception\UnprocessableEventException;
use Symfony\Component\Messenger\MessageBusInterface;

class Client implements DomainClient
{
    /** @var MessageBusInterface */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param ConsumedEvent $event
     * @throws UnprocessableEventException if event (payload) have invalid structure.
     */
    public function consume(ConsumedEvent $event): void
    {
        $this->messageBus->dispatch($event);
    }
}

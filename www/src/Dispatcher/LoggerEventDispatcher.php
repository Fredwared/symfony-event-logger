<?php

namespace App\Dispatcher;

use App\Event\LoggingEvent;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Class LoggerEventDispatcher
 * @package App\Events
 */
class LoggerEventDispatcher implements EventDispatcherInterface
{
    private EventDispatcherInterface $wrappedDispatcher;
    private LoggerInterface $logger;

    public function __construct(EventDispatcherInterface $wrappedDispatcher, LoggerInterface $logger)
    {
        $this->wrappedDispatcher = $wrappedDispatcher;
        $this->logger = $logger;
    }

    /**
     * @param object|LoggingEvent $event
     * @param string|null $eventName
     * @return object
     */
    public function dispatch(object $event, string $eventName = null): object
    {
        $this->logger->info(sprintf('Dispatching event with Message: %s', $event->getMessage()));
        $event = $this->wrappedDispatcher->dispatch($event);
        $this->logger->info(sprintf('Event of type %s dispatched', get_class($event)));

        return $event;
    }
}

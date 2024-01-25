<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class LoggingTestEvent
 * @package App\Event
 */
final class LoggingEvent extends Event
{
    const NAME = 'logging.event';

    /**
     * @var string
     */
    private string $message;

    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}

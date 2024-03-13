<?php

namespace Src\Shared\Bus\Shared\Domain\Entity;

class EventDispatcher
{
    private static $events = [];

    public static function publish($event)
    {
        self::$events[] = $event;
    }

    public static function dispatch($command)
    {
        $eventos = self::$events;
        self::clearEvents();

        foreach ($eventos as $event) {
            $event->setCommand($command);
            event($event);
        }
    }

    public static function getEvents()
    {
        return self::$events;
    }

    public static function clearEvents()
    {
        self::$events = [];
    }
}

<?php

namespace Notification;

final class EventCollection
{
    private $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    public function push(Event $event): void
    {
        array_push($this->collection, $event);
    }

    public function size(): int
    {
        return count($this->collection);
    }
}

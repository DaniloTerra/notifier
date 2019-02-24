<?php

namespace Notification;

use PHPUnit\Framework\TestCase;

final class EventCollectionTest extends TestCase
{
    public function testPush()
    {
        $event = static::createMock(Event::class);
        
        $collection = new EventCollection();
        
        $result = $collection->push($event);

        static::assertNull($result);
        static::assertEquals(1, $collection->size());
    }
}

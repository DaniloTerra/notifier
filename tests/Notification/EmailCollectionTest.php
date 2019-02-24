<?php

namespace Notification;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Notification\EmailCollection
 */
final class EmailCollectionTest extends TestCase
{
    /**
     * @covers ::empty
     */
    public function testEmptyInstance()
    {
        $collection = EmailCollection::empty();

        static::assertInstanceOf(EmailCollection::class, $collection);
    }


    /**
     * @covers ::push
     */
    public function testPush()
    {
        $collection = EmailCollection::empty();
        $email = new Email('test@test.com');

        $result = $collection->push($email);

        static::assertNull($result);
    }
}

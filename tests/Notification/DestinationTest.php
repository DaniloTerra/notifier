<?php

namespace Notification;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass
 */
final class DestinationTest extends TestCase
{
    private function validFullDestination(): Destination
    {
        $to = EmailCollection::filled([new Email('test1@test.com'), new Email('test2@test.com')]);
        $cc = EmailCollection::filled([new Email('test3@test.com'), new Email('test4@test.com')]);
        $bcc = EmailCollection::filled([new Email('test5@test.com'), new Email('test6@test.com')]);
        
        return new Destination($to, $cc, $bcc);
    }

    private function validDestinationWithoutCcAndBcc(): Destination
    {
        $to = EmailCollection::filled([new Email('test1@test.com'), new Email('test2@test.com')]);
        
        return new Destination($to);
    }
    
    /**
     * @covers ::__construct
     */
    public function testValidInstance()
    {
        $destination = $this->validFullDestination();

        static::assertInstanceOf(Destination::class, $destination);
    }


    /**
     * @covers ::__construct
     */
    public function testValidInstanceWithoutCcAndBcc()
    {
        $destination = $this->validDestinationWithoutCcAndBcc();

        static::assertInstanceOf(Destination::class, $destination);
    }


    /**
     * @covers ::to
     * @covers ::cc
     * @covers ::bcc
     */
    public function testGetMethodsFromFullDestination()
    {
        $destination = $this->validFullDestination();

        static::assertEquals(EmailCollection::filled([new Email('test1@test.com'), new Email('test2@test.com')]), $destination->to());
        static::assertEquals(EmailCollection::filled([new Email('test3@test.com'), new Email('test4@test.com')]), $destination->cc());
        static::assertEquals(EmailCollection::filled([new Email('test5@test.com'), new Email('test6@test.com')]), $destination->bcc());
    }


    /**
     * @covers ::to
     * @covers ::cc
     * @covers ::bcc
     */
    public function testGetMethodsFromDestinationWithouCcAndBcc()
    {
        $destination = $this->validDestinationWithoutCcAndBcc();

        static::assertEquals(EmailCollection::filled([new Email('test1@test.com'), new Email('test2@test.com')]), $destination->to());
        static::assertNull($destination->cc());
        static::assertNull($destination->bcc());
    }
}

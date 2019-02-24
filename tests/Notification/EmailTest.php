<?php

namespace Notification;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Notification\Email
 */
final class EmailTest extends TestCase
{
    /**
     * @dataProvider validValues
     * @covers ::__construct
     * @covers ::assertValue
     * @covers ::getValue
     */
    public function testValidValues($value)
    {
        static::assertInstanceOf(Email::class, new Email($value));
    }

    /**
     * @dataProvider invalidValues
     * @covers ::__construct
     * @covers ::assertValue
     * @covers ::getValue
     */
    public function testInvalidValues($value)
    {
        static::expectException(\InvalidArgumentException::class);
        static::expectExceptionMessage(
            sprintf('Invalid argument "%s" for %s type', $value, Email::class)
        );

        new Email($value);
    }

    public function validValues(): array
    {
        return [
            ['email@example.com'],
            ['firstname.lastname@example.com'],
            ['email@subdomain.example.com'],
            ['firstname+lastname@example.com'],
            ['email@123.123.123.123'],
            ['1234567890@example.com'],
            ['email@example-one.com'],
            ['_______@example.com'],
            ['email@example.name'],
            ['email@example.museum'],
            ['email@example.co.jp'],
            ['firstname-lastname@example.com']
        ];
    }

    public function invalidValues(): array
    {
        return [
            ['email#example.com'],
            ['firstname.lastname#example.com'],
            ['email#subdomain.example.com'],
            ['firstname+lastname#example.com'],
            ['email#123.123.123.123'],
            ['1234567890#example.com'],
            ['email#example-one.com'],
            ['_______#example.com'],
            ['email#example.name'],
            ['email#example.museum'],
            ['email#example.co.jp'],
            ['firstname-lastname#example.com']
        ];
    }
}

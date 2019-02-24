<?php

namespace Notification;

final class Email
{
    const PATTERN = '/^\S{1,100}@\S{1,100}$/';


    /**
     * @var string
     */
    private $value;


    /**
     * @param string $value
     * @return self
     */
    public function __construct(string $value)
    {
        $this->assertValue($value);
        
        $this->value = $value;
    }


    /**
     * @param mixed @value
     * @throws InvalidArgumentException
     * @return void
     */
    private function assertValue($value): void
    {
        if (!preg_match(self::PATTERN, $value)) {
            throw new \InvalidArgumentException(
                sprintf('Invalid argument "%s" for %s type', $value, static::class)
            );
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

<?php

namespace Notification;

final class EmailCollection extends Collection
{
    const TYPE = Email::class;


    /**
     * @return string
     */
    protected function allowedType(): string
    {
        return self::TYPE;
    }
}

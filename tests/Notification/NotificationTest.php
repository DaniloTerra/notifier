<?php

namespace Notification;

use PHPUnit\Framework\TestCase;

final class NotificationTest extends TestCase
{
    private function validInstance()
    {
        return Notification::create([
            'destination' => [
                'to' => ['test1@test.com', 'test2@test.com'],
                'cc' => ['test3@test.com', 'test4@test.com'],
                'bcc' => ['test4@test.com', 'test5@test.com']
            ],
            'message' => [
                'subject' => 'This is the subject',
                'body' => [
                    'text' => 'This is the notification message'
                ]
            ],
            'replyTo' => ['reply-to@test.com']
        ]);
    }
    
    public function testValidInstance()
    {
        $notification = $this->validInstance();

        static::assertInstanceOf(Notification::class, $notification);
    }

    // public function testSend()
    // {
    //     $notification = $this->validInstance();

    //     static::assertNull($notification->send());
    // }

    // public function testSendedEvent()
    // {
    //     $notification = $this->validInstance();

    //     $notification->send();
        
    //     static::assertEquals(1, $notification->events()->size());
    // }
}

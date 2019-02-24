<?php

namespace Notification;

final class Notification
{
    /**
     * @var Destination
     */
    private $destination;


    /**
     * @var Message
     */
    private $message;
    
    
    /**
     * @var Reply
     */
    private $reply;
    
    
    /**
     * @var EventCollection
     */
    private $events;


    /**
     * @param Destination     $destination
     * @param Message         $message
     * @param Reply           $reply
     * @param EventCollection $events
     */
    private function __construct(
        Destination $destination,
        Message $message,
        Reply $reply,
        EventCollection $events
    ) {
        $this->destination = $destination;
        $this->message = $message;
        $this->reply = $reply;
        $this->events = $events;
    }
    

    /**
     * @return void
     */
    public function send(): void
    {
        $this->events->push(
            new EmailSended()
        );
    }


    /**
     * @return EventCollection
     */
    public function events(): EventCollection
    {
        return $this->events;
    }
    

    /**
     * @param array $data
     * @return self
     */
    public static function create(array $data): self
    {
        $destination = new Destination(
            EmailCollection::filled()
        );
        $message = [];
        $reply = [];
        $event = [];

        return new self($destination, $message, $reply, $event);
    }
}

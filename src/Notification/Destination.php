<?php

namespace Notification;

final class Destination
{
    /**
     * @var EmailCollection
     */
    private $to;


    /**
     * @var EmailCollection|null
     */
    private $cc;


    /**
     * @var EmailCollection|null
     */
    private $bcc;
    

    /**
     * @param EmailCollection $to
     * @param EmailCollection $cc
     * @param EmailCollection $bcc
     */
    public function __construct(EmailCollection $to, ?EmailCollection $cc = null, ?EmailCollection $bcc = null)                                      
    {
        $this->to = $to;
        $this->cc = $cc;
        $this->bcc = $bcc;
    }


    /**
     * @return EmailCollection|null
     */
    public function to()
    {
        return $this->to;
    }


    /**
     * @return EmailCollection|null
     */
    public function cc()
    {
        return $this->cc;
    }


    /**
     * @return EmailCollection|null
     */
    public function bcc()
    {
        return $this->bcc;
    }
}

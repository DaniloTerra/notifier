<?php

namespace Notification;

interface Collectible
{
    /**
     * @return self
     */
    public static function empty();


    /**
     * @param array $collection
     * @return self
     */
    public static function filled(array $collection);


    /**
     * @return int
     */
    public function size(): int;


    /**
     * @return void
     */
    public function push($item): void;
}

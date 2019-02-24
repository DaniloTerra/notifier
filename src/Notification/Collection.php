<?php

namespace Notification;

abstract class Collection implements Collectible
{
    /**
     * @var array
     */
    protected $collection;


    /**
     * @return int
     */
    public function size(): int
    {
        return count($this->collection);
    }


    /**
     * @param mixed $item
     * @throws InvalidArgumentException
     * @return void
     */
    public function push($item): void
    {
        $this->assertType($item);

        $this->collection[] = $item;
    }


    /**
     * @return string
     */
    abstract protected function allowedType(): string;
    

    /**
     * @param $item
     * @throws InvalidArgumentException
     * @return void
     */
    private function assertType($item): void
    {
        $expected = $this->allowedType();
        $received = get_class($item);
        
        if ($expected !== $received) {
            throw new \InvalidArgumentException(
                sprintf('Invalid item type for this collection. Expected: %s. Received: %s', $expected, $received)
            );
        }
    }


    /**
     * @return self
     */
    public static function empty()
    {
        return new static();
    }


    /**
     * @param array $collection
     * @return self
     */
    public static function filled(array $collection)
    {
        $new = static::empty();

        foreach ($collection as $item) {
            $new->push($item);
        }

        return $new;
    }
}

<?php

namespace App;

class Queue
{

    public const MAX_ITEMS = 5;

    protected $items = [];

    public function push(string $item): void
    {
        if ($this->getCount() >= static::MAX_ITEMS) {
            throw new \Exception('Queue is full');
        }

        $this->items[] = $item;
    }

    public function pop(): string
    {
        return array_shift($this->items);
    }

    public function getCount(): int
    {
        return count($this->items);
    }

    public function clear(): void
    {
        $this->items = [];
    }
}

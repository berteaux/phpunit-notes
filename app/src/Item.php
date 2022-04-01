<?php

namespace App;

class Item
{
    public function getDescription(): string
    {
        return $this->getID() . $this->getToken();
    }

    protected function getID(): int
    {
        return rand();
    }

    private function getToken(): string
    {
        return uniqid();
    }

    private function getPrefixedToken(string $prefix): string
    {
        return uniqid($prefix);
    }
}

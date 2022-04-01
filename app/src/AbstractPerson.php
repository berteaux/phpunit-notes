<?php

namespace App;

abstract class AbstractPerson
{
    abstract protected function getTitle(): string;

    abstract protected function getFullName(): string;

    public function getFullNameAndTitle(): string
    {
        return $this->getTitle() . ' ' . $this->getFullName();
    }
}

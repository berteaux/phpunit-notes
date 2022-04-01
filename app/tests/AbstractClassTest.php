<?php

use PHPUnit\Framework\TestCase;
use App\User;
use App\AbstractPerson;

class AbstractClassTest extends TestCase
{
    public function testAbstractClassUsingChild()
    {
        $teacher = new User();
        $teacher->firstname = 'John';
        $teacher->lastname = 'Doe';

        $this->assertEquals('M. John Doe', $teacher->getFullNameAndTitle());
    }

    public function testAbstractClassUsingMock()
    {
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->getMockForAbstractClass();

        $mock->method('getTitle')->willReturn('M.');
        $mock->method('getFullName')->willReturn('John Doe');

        $this->assertEquals('M. John Doe', $mock->getFullNameAndTitle());
    }
}
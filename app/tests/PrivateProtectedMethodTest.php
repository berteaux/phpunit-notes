<?php

use PHPUnit\Framework\TestCase;
use App\Item;
use App\ItemChild;

/**
 * Test private/protected method
 * Not really a good practice but in some cases,
 * it can be interesting to test private and protected methods
 */
class PrivateProtectedMethodTest extends TestCase
{
    public function testProtectedMethodFromInheritance()
    {
        $item = new ItemChild();

        $this->assertIsInt($item->getID());
    }

    public function testPrivateMethodUsingReflection()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);

        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function testPrivateMethodWithParametersUsingReflection()
    {
        $item = new Item();

        $reflector = new ReflectionClass(Item::class);
        $method = $reflector->getMethod('getPrefixedToken');
        $method->setAccessible(true);

        $result = $method->invokeArgs($item, ['example']);

        $this->assertStringStartsWith('example', $result);
    }
}


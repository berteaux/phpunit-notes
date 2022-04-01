<?php 

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
	public function testSomething()
	{
		$this->assertEquals(4, 2 + 2);
	}
}
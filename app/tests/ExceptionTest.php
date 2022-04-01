<?php 

use PHPUnit\Framework\TestCase;
use App\User;

class ExceptionTest extends TestCase
{
	public function testExceptionThrown()
	{
		$user = new User();

		$this->expectException(\Exception::class);
		$this->expectExceptionMessage('Empty message');

		$user->notify('');
	}
}
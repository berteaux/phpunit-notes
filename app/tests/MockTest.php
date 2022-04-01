<?php

use PHPUnit\Framework\TestCase;
use App\Mailer;
use App\User;
use App\Order;

class MockTest extends TestCase
{
    public function testSimpleMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock
            ->method('sendMessage')
            ->willReturn(true);                
        
        $result = $mock->sendMessage('user@example.com', 'Hello');
        
        $this->assertTrue($result);
    }

    public function testMockedMethod()
    {
        $user = new User();

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('edwige@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

         $user->setMailer($mockMailer);

        $user->email = 'edwige@example.com';
        $this->assertTrue($user->notify('Hello'));
    }

    public function testNotMockedMethod()
    {
        $user = new User();

        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(\Exception::class);

        $user->notify('Hello');
    }

    public function testAMockedDependancyThatDoesntExist()
    {
        $gateway = $this->getMockBuilder('App\PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();
            
        $gateway
            ->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
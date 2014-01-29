<?php

namespace spec\Stryder\Socket;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function it_puts_the_lotion_on_its_skin()
    {
        $this->shouldHaveType('Stryder\Socket\Client');
    }

    function it_writes_to_a_file()
    {
        $path = '/tmp';
        $this->write($path);
    }

    function xit_returns_a_valid_resource()
    {
        $remoteSocket = 'udg:///dev/log';
        $this->beConstructedWith($remoteSocket);
        $this->getResource()->shouldHaveType('\resource');
    }
}

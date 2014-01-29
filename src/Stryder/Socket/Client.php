<?php

namespace Stryder\Socket;

class Client
{
    private $remoteSocket;

    private $resource;

    public function __construct($remoteSocket)
    {
        $this->remoteSocket = $remoteSocket;
    }

    public function write($data)
    {
        $resource = $this->getResource();
        return fwrite($resource, $data);
    }

    public function getResource()
    {
        if ($this->resource === null) {
            $this->resource = stream_socket_client($this->remoteSocket);
        }
        var_dump($this->resource);
        return $this->resource;
    }
}

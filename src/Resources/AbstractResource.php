<?php

namespace Fstarkcyber\RajaOngkir\Resources;

abstract class AbstractResource
{
    /** @var array */
    protected $result = [];

    /** @var \Fstarkcyber\RajaOngkir\HttpClients\AbstractClient */
    protected $httpClient;

    public function get(): array
    {
        return $this->result;
    }
}

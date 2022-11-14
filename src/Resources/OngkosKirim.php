<?php

namespace Fstarkcyber\RajaOngkir\Resources;

use Fstarkcyber\RajaOngkir\HttpClients\AbstractClient;

class OngkosKirim extends AbstractResource
{
    /**
     * @param \Fstarkcyber\RajaOngkir\HttpClients\AbstractClient $httpClient
     */
    public function __construct(AbstractClient $httpClient, array $payload)
    {
        $this->httpClient = $httpClient;
        $this->httpClient->setEntity('cost');
        $this->httpClient->setHttpMethod('POST');

        $this->callRequest($payload);
    }

    private function callRequest(array $payload)
    {
        $this->result = $this->httpClient->request($payload);
    }
}

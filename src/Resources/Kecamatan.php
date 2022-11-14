<?php

namespace Fstarkcyber\RajaOngkir\Resources;

use Fstarkcyber\RajaOngkir\HttpClients\AbstractClient;

class Kecamatan extends AbstractLocation
{
    /**
     * @param \Fstarkcyber\RajaOngkir\HttpClients\AbstractClient $httpClient
     */
    public function __construct(AbstractClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->httpClient->setEntity('subdistrict');
        $this->httpClient->setHttpMethod('GET');
    }

    /**
     * @return self
     */
    public function setSearchColumn()
    {
        $this->searchDriver->setSearchColumn('subdistrict_name');

        return $this;
    }

    /**
     * @param int|string $provinceId
     * @return self
     */
    public function dariKota($city_id): self
    {
        $this->result = $this->httpClient->request(['city' => $city_id]);

        return $this;
    }
}

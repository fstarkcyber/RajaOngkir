<?php

namespace Fstarkcyber\RajaOngkir;

use Fstarkcyber\RajaOngkir\Resources\Kota;
use Fstarkcyber\RajaOngkir\Resources\Provinsi;
use Fstarkcyber\RajaOngkir\Resources\Kecamatan;
use Fstarkcyber\RajaOngkir\Resources\OngkosKirim;
use Fstarkcyber\RajaOngkir\HttpClients\BasicClient;
use Fstarkcyber\RajaOngkir\SearchDrivers\BasicDriver;
use Fstarkcyber\RajaOngkir\HttpClients\AbstractClient;
use Fstarkcyber\RajaOngkir\Contracts\HttpClientContract;
use Fstarkcyber\RajaOngkir\SearchDrivers\AbstractDriver;
use Fstarkcyber\RajaOngkir\Contracts\SearchDriverContract;

class RajaOngkir
{
    /** @var \Fstarkcyber\RajaOngkir\Contracts\HttpClientContract */
    protected $httpClient;

    /** @var \Fstarkcyber\RajaOngkir\Contracts\SearchDriverContract */
    protected $searchDriver;

    /** @var array */
    protected $options;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $package;

    /**
     * @param string $apiKey
     * @param string $package
     */
    public function __construct(string $apiKey, string $package = 'starter')
    {
        $this->apiKey = $apiKey;
        $this->package = $package;

        $this->setHttpClient(new BasicClient);
    }

    /**
     * @param \Fstarkcyber\RajaOngkir\Contracts\HttpClientContract $httpClient
     * @return self
     */
    public function setHttpClient(HttpClientContract $httpClient): self
    {
        $this->httpClient = $httpClient;
        $this->httpClient->setApiKey($this->apiKey);
        $this->httpClient->setPackage($this->package);

        return $this;
    }

    /**
     * @param \Fstarkcyber\RajaOngkir\Contracts\SearchDriverContract $searchDriver
     * @return self
     */
    public function setSearchDriver(SearchDriverContract $searchDriver): self
    {
        $this->searchDriver = $searchDriver;

        return $this;
    }

    /**
     * @return \Fstarkcyber\RajaOngkir\Resources\Provinsi;
     */
    public function provinsi(): Provinsi
    {
        $resource = new Provinsi($this->httpClient);

        if (null === $this->searchDriver) {
            $resource->setSearchDriver(new BasicDriver);
            $resource->setSearchColumn();
        }

        return $resource;
    }

    /**
     * @return \Fstarkcyber\RajaOngkir\Resources\Kota;
     */
    public function kota(): Kota
    {
        $resource = new Kota($this->httpClient);

        if (null === $this->searchDriver) {
            $resource->setSearchDriver(new BasicDriver);
            $resource->setSearchColumn();
        }

        return $resource;
    }

    public function kecamatan(): Kecamatan
    {
        $resource = new Kecamatan($this->httpClient);

        if (null === $this->searchDriver) {
            $resource->setSearchDriver(new BasicDriver);
            $resource->setSearchColumn();
        }

        return $resource;
    }

    /**
     * @param array $payload
     * @return \Fstarkcyber\RajaOngkir\Resources\OngkosKirim;
     */
    public function ongkosKirim(array $payload): OngkosKirim
    {
        return new OngkosKirim($this->httpClient, $payload);
    }

    /**
     * @return \Fstarkcyber\RajaOngkir\Resources\OngkosKirim;
     */
    public function ongkir(array $payload): OngkosKirim
    {
        return $this->ongkosKirim($payload);
    }

    /**
     * @return \Fstarkcyber\RajaOngkir\Resources\OngkosKirim;
     */
    public function biaya(array $payload): OngkosKirim
    {
        return $this->ongkosKirim($payload);
    }
}

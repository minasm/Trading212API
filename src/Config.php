<?php

namespace MinasM\T212;

class Config
{
    /**
     * Api key
     */
    protected string $apiToken;

    /**
     * Base api url
     */
    protected string $apiUrl = 'https://demo.trading212.com/api/v0/';

    /**
     * config constructor
     */
    public function __construct(string $apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * returns api key
     */
    public function getApiToken(): string
    {
        return $this->apiToken;
    }

    /**
     * set api key
     */
    public function setApiToken(string $apiToken): void
    {
        $this->apiToken = $apiToken;
    }

    /**
     * returns base api url
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * set base api url
     *
     * @param [type] $apiUrl
     */
    public function setApiUrl($apiUrl): void
    {
        $this->apiUrl = $apiUrl;
    }
}

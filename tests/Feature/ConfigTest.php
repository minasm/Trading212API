<?php

namespace Tests\Feature;

use MinasM\T212\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    protected Config $config;

    protected function setUp(): void
    {
        parent::setUp();
        $this->config = new Config('apitoken');
    }

    /** @test * */
    public function api_token()
    {
        $this->assertNotEmpty($this->config->getApiToken());

        $randomString = (string)rand(1000, 2500);
        $this->config->setApiToken($randomString);
        $this->assertSame($randomString, $this->config->getApiToken());
    }

    /** @test * */
    public function api_url()
    {
        $apiUrl = 'https://demo.trading212.com/api/v0/';

        $this->assertNotEmpty($this->config->getApiUrl());

        $this->assertSame($apiUrl, $this->config->getApiUrl());

        $randomString = (string)rand(1000, 2500);
        $this->config->setApiUrl($randomString);
        $this->assertSame($randomString, $this->config->getApiUrl());
    }
}

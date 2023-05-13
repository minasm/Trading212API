<?php

namespace Tests\Feature;

use BadMethodCallException;
use MinasM\T212\Api\Exchanges;
use MinasM\T212\Api\MarketData;
use MinasM\T212\Api\Orders;
use MinasM\T212\T212;
use Tests\T212TestCase;

class T212Test extends T212TestCase
{
    protected T212 $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->client();
    }

    /** @test **/
    public function check_instance_of_exchange()
    {
        $exchange = $this->client->exchanges();
        $this->assertInstanceOf(Exchanges::class, $exchange);

        $exchange = $this->client->api('exchanges');
        $this->assertInstanceOf(Exchanges::class, $exchange);
    }

    /** @test **/
    public function magic_call_exception()
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage('Undefined method called: "foo"');
        $this->client->foo();
    }

    /** @test **/
    public function api_function_call_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Undefined api instance called: "bar"');

        $this->client->api('bar');
    }

    /** @test **/
    public function check_instance_of_stock()
    {
        $stock = $this->client->orders();
        $this->assertInstanceOf(Orders::class, $stock);

        $stock = $this->client->api('orders');
        $this->assertInstanceOf(Orders::class, $stock);
    }

    /** @test **/
    public function check_instance_of_market_data()
    {
        $stock = $this->client->marketData();
        $this->assertInstanceOf(MarketData::class, $stock);

        $stock = $this->client->api('marketData');
        $this->assertInstanceOf(MarketData::class, $stock);
    }
}

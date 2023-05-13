<?php
namespace Tests\Feature;

use Tests\T212TestCase;

class MarketDataTest extends T212TestCase
{
    protected $marketData;

    protected function setUp(): void
    {
        parent::setUp();

        $this->marketData = $this->client()->marketData();
    }

    /** @test */
    public function it_grabs_lastPrice_for_a_ticker()
    {

        $content = $this->marketData->lastPriceForTicker('AAPL_US_EQ')->json();
        $responseData = (array)json_decode($content);

        $this->assertArrayHasKey('price', $responseData);
        $this->assertArrayHasKey('timestamp', $responseData);
    }

    /** @test */
    public function it_grabs_lastPrice_for_multiple_tickers()
    {
        $tickers = ['AAPL_US_EQ','MSFT_US_EQ'];

        $content = $this->marketData->lastPriceForMultipleTickers($tickers)->json();
        $responseData = (array)json_decode($content);

        $this->assertArrayHasKey('price', $responseData);
        $this->assertArrayHasKey('timestamp', $responseData);
    }




}

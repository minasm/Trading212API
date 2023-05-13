<?php

namespace Tests\Feature;

use Tests\T212TestCase;

class OrdersTest extends T212TestCase
{
    protected $orders;

    protected function setUp(): void
    {
        parent::setUp();
        $this->orders = $this->client()->orders();
    }

    /** @test */
    public function it_grabs_lastPrice_for_a_ticker()
    {
        $content = $this->orders->list()->json();

        $this->assertNotEmpty($content);
    }
}

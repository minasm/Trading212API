<?php

namespace Tests\Feature;

use Tests\T212TestCase;

class ExchangesTest extends T212TestCase
{
    protected $exchanges;

    protected function setUp(): void
    {
        parent::setUp();
        $this->exchanges = $this->client()->exchanges();
    }

    /** @test */
    public function it_gets_the_exchanges_list()
    {
        $content = $this->exchanges->list()->json();

        $this->assertNotEmpty($content);
    }
}

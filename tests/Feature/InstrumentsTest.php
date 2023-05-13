<?php
namespace Tests\Feature;

use Tests\T212TestCase;

class InstrumentsTest extends T212TestCase
{
    protected $instruments;

    protected function setUp(): void
    {
        parent::setUp();

        $this->instruments =$this->client()->instruments();
    }

    /** @test */
    public function it_grabs_lastPrice_for_a_ticker()
    {
        $content = $this->instruments->list()->json();

        $this->assertNotEmpty($content);
    }

}

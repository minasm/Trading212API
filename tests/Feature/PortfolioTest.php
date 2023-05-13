<?php

namespace Tests\Feature;

use Tests\T212TestCase;

class PortfolioTest extends T212TestCase
{
    protected $portfolio;

    protected function setUp(): void
    {
        parent::setUp();
        $this->portfolio = $this->client()->portfolio();
    }

    /** @test */
    public function it_gets_all_positions()
    {
        $content = $this->portfolio->all_positions()->json();

        $this->assertNotEmpty($content);
    }

    /** @test */
    public function it_gets_a_position()
    {
        $content = $this->portfolio->single_position('AAPL_US_EQ')->json();

        $this->assertNotEmpty($content);
    }
}

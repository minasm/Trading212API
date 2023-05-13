<?php

namespace Tests\Feature;

use Tests\T212TestCase;

class TransactionsTest extends T212TestCase
{
    protected $transactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->transactions = $this->client()->transactions();
    }

    /** @test */
    public function it_grabs_the_transactions_list()
    {
        $content = $this->transactions->list()->json();

        $this->assertNotEmpty($content);
    }
}

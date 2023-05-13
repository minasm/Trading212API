<?php

namespace Tests\Feature;

use MinasM\T212\Config;
use MinasM\T212\T212;
use PHPUnit\Framework\TestCase;
use Tests\T212TestCase;

class DemoTest extends T212TestCase
{
    protected $instruments;

//    /** @test */
//    public function it_l()
//    {
//        $dotenvFilePath = realpath(__DIR__. '/../../.env' );
////        die($dotenvFilePath);
//        $e = getenv('API_TOKEN');
//        $d = $_ENV['API_TOKEN'];
//        $this->assertNotNull($_ENV['API_TOKEN']);
////        $this->assertEquals(1,1);
//    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->instruments = (new T212(new Config($_ENV['API_TOKEN'])))->instruments();
    }

    /** @test */
    public function it_grabs_lastPrice_for_a_ticker()
    {
        $content = $this->instruments->list()->json();

        $this->assertNotEmpty($content);
    }

}

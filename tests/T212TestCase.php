<?php

namespace Tests;

use Dotenv\Dotenv;
use MinasM\T212\Config;
use MinasM\T212\T212;
use PHPUnit\Framework\TestCase;

class T212TestCase extends TestCase
{
    private T212 $t212;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadEnvironmentVariables();
    }

    protected function loadEnvironmentVariables(): void
    {

        $dotenvFilePath = getenv('PWD').'/.env';

        if (file_exists($dotenvFilePath)) {
//            $dotenv = Dotenv::createImmutable(getenv('PWD') . '/.env');
//            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv = Dotenv::createImmutable(getenv('PWD'));
//            $dotenv->safeLoad();
            $dotenv->load();
//            $dotenv->required('API_TOKEN');
            $this->t212 = (new T212(new Config($_ENV['API_TOKEN'])));

        }

    }

    public function client(): T212
    {
        return $this->t212;
    }
}

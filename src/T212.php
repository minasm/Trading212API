<?php

namespace MinasM\T212;

use MinasM\T212\Api\Exchanges;
use MinasM\T212\Api\Instruments;
use MinasM\T212\Api\MarketData;
use MinasM\T212\Api\Orders;
use MinasM\T212\Api\Portfolio;
use MinasM\T212\Api\T212Client;
use MinasM\T212\Api\Transactions;

class T212
{
    /**
     * Config class variable
     *
     * @var Config
     */
    protected Config $config;

    /**
     * constructor
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * factory method for creating api object
     */
    public function api(string $name): T212Client
    {
        $name = strtolower($name);

        return match ($name) {
            'marketdata' => new MarketData($this->config),
            'instruments' => new Instruments($this->config),
            'exchanges' => new Exchanges($this->config),
            'portfolio' => new Portfolio($this->config),
            'orders' => new Orders($this->config),
            'transactions' => new Transactions($this->config),
            default => throw new \InvalidArgumentException(
                sprintf('Undefined api instance called: "%s"', $name)
            ),
        };
    }

    /**
     * magic method for creating fluent access
     *
     * @return T212Client
     */
    public function __call(string $name, array $arguments)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $exception) {
            throw new \BadMethodCallException(
                sprintf('Undefined method called: "%s"', $name)
            );
        }
    }
}

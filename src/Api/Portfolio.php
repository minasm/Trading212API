<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Portfolio extends T212Client
{
    use Actionable;

    /**
     * Fetch an open positions for your account
     * url: https://t212public-api-docs.redoc.ly/#operation/portfolio
     */
    public function all_positions(): Portfolio
    {
        $this->urlSegment = '/equity/portfolio';
        $this->setParams('', []);

        return $this;
    }

    /**
     * Fetch an open position by ticker
     * url: https://t212public-api-docs.redoc.ly/#operation/positionByTicker
     */
    public function single_position(string $symbol): Portfolio
    {
        $this->urlSegment = '/equity/portfolio';
        $this->setParams($symbol, []);

        return $this;
    }
}

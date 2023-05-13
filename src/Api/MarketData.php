<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class MarketData extends T212Client
{
    use Actionable;

    /**
     * Instrument Indicative Pricing for a Ticker
     * url: https://t212public-api-docs.redoc.ly/#operation/lastTradePrice
     */
    public function lastPriceForTicker(string $symbol, array $params = []): MarketData
    {
        $this->urlSegment = '/market-data/ltp';
        $this->setParams($symbol, $params, 'post');

        return $this;
    }

    /**
     * Instrument Indicative Pricing (Up to 20 tickers)
     *  url: https://t212public-api-docs.redoc.ly/#operation/lastTradePrice_1
     */
    public function lastPriceForMultipleTickers(array $tickers): MarketData
    {
        $this->urlSegment = '/market-data/ltp';

        $data = [];

        foreach ($tickers as $ticker) {
            $data[] = ['ticker' => $ticker];
        }

        $this->post($data);

        return $this;
    }
}

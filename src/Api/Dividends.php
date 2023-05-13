<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Orders extends T212Client
{
    use Actionable;

    /**
     * Fetch All Paid out dividends
     * url: https://t212public-api-docs.redoc.ly/#operation/dividends
     *
     * @param  string|null  $ticker
     */
    public function paidDividends(string|null $ticker = null): Orders
    {
        // TODO Create a test
        $this->urlSegment = '/equity/history/dividends';

        $params = [
            'limit' => 1,
            'ticker' => $ticker,
            'cursor' => null,
        ];

        $this->setParams('', $params);

        return $this;
    }
}

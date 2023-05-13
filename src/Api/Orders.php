<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Orders extends T212Client
{
    use Actionable;

    /**
     * Fetch All Account Orders
     * url: https://t212public-api-docs.redoc.ly/#operation/orders
     *
     * @param  string|null  $ticker
     */
    public function list(string|null $ticker = null): Orders
    {
        $this->urlSegment = '/equity/history/orders';

        $params = [
            'limit' => 1,
            'ticker' => $ticker,
            'cursor' => null,
        ];

        $this->setParams('', $params);

        return $this;
    }
}

<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Transactions extends T212Client
{
    use Actionable;

    /**
     * Fetch superficial information about movements to and from your account
     * url: https://t212public-api-docs.redoc.ly/#operation/transactions
     *
     * @param  string|null  $cursor
     */
    public function list(string|null $cursor = null, int $limit = 0): Transactions
    {
        $this->urlSegment = '/history/transactions';
        $this->setParams('', [
            'cursor' => $cursor,
            'limit' => $limit,
        ]);

        return $this;
    }
}

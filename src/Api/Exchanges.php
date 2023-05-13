<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Exchanges extends T212Client
{
    use Actionable;

    /**
     * Fetch all exchanges and their corresponding working schedules that your account has access to
     * url: https://t212public-api-docs.redoc.ly/#operation/exchanges
     */
    public function list(): Exchanges
    {
        $this->urlSegment = '/equity/metadata/exchanges';
        $this->setParams('', []);

        return $this;
    }
}

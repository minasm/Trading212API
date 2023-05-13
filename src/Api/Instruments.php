<?php

namespace MinasM\T212\Api;

use MinasM\T212\Traits\Actionable;

class Instruments extends T212Client
{
    use Actionable;

    /**
     * Fetch all instruments that your account has access to
     * url: https://t212public-api-docs.redoc.ly/#operation/instruments
     */
    public function list(): Instruments
    {
        $this->urlSegment = '/equity/metadata/instruments';
        $this->setParams('', []);

        return $this;
    }
}

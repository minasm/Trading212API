<?php

namespace MinasM\T212\Traits;

trait Actionable
{
    /**
     * A symbol or code
     */
    protected string|array $symbol;

    /**
     * extra query params
     */
    protected array $params;

    protected string $requestType;

    /**
     * setter for symbol and query params
     */
    public function setParams(string|array $symbol, array $params, string $requestType = 'get'): void
    {
        $this->symbol = $symbol;
        $this->params = $params;
        $this->requestType = $requestType;
    }

    /**
     * make call to api
     *
     * @param  string  $dataType
     * @return string|json
     */
    public function getData($dataType = self::DATA_TYPE_JSON)
    {
        $params = array_merge($this->params, ['fmt' => $dataType]);
        if ($this->requestType == 'get') {
            return $this->get($this->symbol, $params);
        }

        return $this->post($this->symbol, $params);
    }

    /**
     * return json data
     *
     * @return json
     */
    public function json()
    {
        return $this->getData(self::DATA_TYPE_JSON);
    }
}

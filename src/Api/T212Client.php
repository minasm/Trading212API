<?php

namespace MinasM\T212\Api;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\RequestOptions;
use MinasM\T212\Config;
use PHPUnit\Util\Json;

abstract class T212Client
{
    const DATA_TYPE_JSON = 'json';

    /**
     * configuration
     */
    protected Config $config;

    /**
     * GuzzleHttp client
     */
    protected GuzzleHttpClient $client;

    /**
     * url segment which added in base api path
     */
    protected string $urlSegment = '';

    /**
     * T212Client constructor
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->client = new GuzzleHttpClient();
    }

    /**
     * get api uri
     */
    public function getApiUri(): string
    {
        return rtrim($this->config->getApiUrl(), '/').$this->urlSegment;
    }

    /**
     * send request for api
     */
    public function get(string $symbol, array $params = []): string|Json
    {
        $segment = $symbol ? ('/'.$symbol) : '';
        $headers = [
            'Authorization' => $this->config->getApiToken(),
        ];
        $response = $this->client->get($this->getApiUri().$segment.'?', [
            'headers' => $headers,
        ]);

        return $response->getBody()->getContents();
    }

    /**
     * send POST request for API
     */
    public function post(array $data, string $dataType = self::DATA_TYPE_JSON): string|Json
    {
        $options = [
            RequestOptions::JSON => $data,
            RequestOptions::HEADERS => [
                'Authorization' => $this->config->getApiToken(),
                'Content-Type' => 'application/json',
            ],
        ];

        $response = $this->client
            ->post($this->getApiUri(), $options);

        if ($dataType === self::DATA_TYPE_JSON) {
            return json_decode($response->getBody(), true);
        } else {
            return $response->getBody()->getContents();
        }
    }
}

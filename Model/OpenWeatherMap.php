<?php

namespace RobertRupa\Weather\Model;

use Magento\Framework\HTTP\ZendClientFactory;

class OpenWeatherMap
{
    CONST API_ENDPOINT = 'https://api.openweathermap.org/data/';
    CONST API_VERSION = '2.5/';
    CONST API_GET_WEATHER = 'weather';
    CONST API_KEY = 'c628a21367dd49299cf5e7849dc8c166';

    /**
     * @var $httpClient Magento\Framework\HTTP\ZendClient
     */
    private $httpClient;

    /**
     * OpenWeatherMap constructor.
     * @param ZendClientFactory $httpClient
     */
    public function __construct(ZendClientFactory $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getCurrentWeather(string $city, string $country = null)
    {
        $url = self::API_ENDPOINT.self::API_VERSION.self::API_GET_WEATHER;
        $params= [
            "q" => $city.($country ? ",".$country : "" ),
            "units" => "metric",
            "lang" => "pl",
            "appid" => self::API_KEY
        ];
        $weather = $this->apiCaller($url,\Zend_Http_Client::GET, $params);
        $weatherBody = json_decode($weather->getBody());
        return $weatherBody;
    }

    public function apiCaller($url, $method, $params, $header = null)
    {
        /**
         * @var $apiCaller Magento\Framework\HTTP\ZendClient
         */
        $apiCaller = $this->httpClient->create();
        if($method === \Zend_Http_Client::GET){
            $apiCaller->setParameterGet($params);
        }
        elseif ($method === \Zend_Http_Client::POST){
            $apiCaller->setParameterPost($params);
        }

        //
        $apiCaller->setUri($url);
        $apiCaller->setMethod($method);
        $apiCaller->setHeaders([
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Key: ' . $header,
        ]);
        return $apiCaller->request();
    }
}
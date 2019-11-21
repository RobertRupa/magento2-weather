<?php

namespace RobertRupa\Weather\Cron;

use RobertRupa\Weather\Api\Data\WeatherInterfaceFactory;
use RobertRupa\Weather\Api\Data\WeatherRepositoryInterface;
use RobertRupa\Weather\Model\OpenWeatherMap;
use RobertRupa\Weather\Helper\Data as Helper;

class UpdateWeather
{
    /**
     * @var WeatherRepositoryInterface
     */
    protected $weatherRepositoryInterface;

    /**
     * @var WeatherInterfaceFactory
     */
    protected $weatherRepositoryFactory;

    /**
     * @var OpenWeatherMap
     */
    private $openWeatherMap;
    /**
     * @var Helper
     */
    private $helper;

    /**
     * ResetPoints constructor.
     * @param WeatherRepositoryInterface $weatherRepositoryInterface
     * @param WeatherInterfaceFactory $weatherRepositoryFactory
     * @param OpenWeatherMap $openWeatherMap
     * @param Helper $helper
     */
    public function __construct(
        WeatherRepositoryInterface $weatherRepositoryInterface,
        WeatherInterfaceFactory $weatherRepositoryFactory,
        OpenWeatherMap $openWeatherMap,
        Helper $helper
    ) {
        $this->weatherRepositoryInterface   = $weatherRepositoryInterface;
        $this->weatherRepositoryFactory   = $weatherRepositoryFactory;
        $this->openWeatherMap = $openWeatherMap;
        $this->helper = $helper;
    }

    /**
     * @return $this
     */
    public function execute()
    {
        $weatherDataFromAPI = $this->openWeatherMap->getCurrentWeather("Lublin", "pl");

        $weather = $this->weatherRepositoryFactory->create();
        $weather->setData($this->helper->rearrangeData($weatherDataFromAPI));
        $this->weatherRepositoryInterface->save($weather);
        return $this;
    }
}

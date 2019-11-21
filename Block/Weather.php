<?php

namespace RobertRupa\Weather\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use RobertRupa\Weather\Api\Data\WeatherRepositoryInterface;

class Weather extends Template
{
    /**
     * @var WeatherRepositoryInterface
     */
    private $weatherRepository;

    /**
     * Weather constructor.
     * @param Context $context
     * @param WeatherRepositoryInterface $weatherRepository
     * @param array $data
     */
    public function __construct(
        Context $context,
        WeatherRepositoryInterface $weatherRepository,
        array $data = []
    ){
        parent::__construct($context, $data);
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface
     */
    public function getLastWeather()
    {
        return $this->weatherRepository->getLast();
    }
}
<?php

namespace RobertRupa\Weather\Console\Command;

use RobertRupa\Weather\Api\Data\WeatherInterfaceFactory;
use RobertRupa\Weather\Api\Data\WeatherRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RobertRupa\Weather\Model\OpenWeatherMap;
use RobertRupa\Weather\Helper\Data as Helper;

class UpdateWeather extends Command
{
    const COMMAND_NAME = 'robertrupa:update-weather';

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
     * @param string|null $name
     */
    public function __construct(
        WeatherRepositoryInterface $weatherRepositoryInterface,
        WeatherInterfaceFactory $weatherRepositoryFactory,
        OpenWeatherMap $openWeatherMap,
        Helper $helper,
        string $name = null
    ) {
        parent::__construct($name);
        $this->weatherRepositoryInterface   = $weatherRepositoryInterface;
        $this->weatherRepositoryFactory   = $weatherRepositoryFactory;
        $this->openWeatherMap = $openWeatherMap;
        $this->helper = $helper;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)
            ->setDescription('Update weather from API');
    }

    /**
     * @return $this
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $weatherDataFromAPI = $this->openWeatherMap->getCurrentWeather("Lublin", "pl");

        $weather = $this->weatherRepositoryFactory->create();
        $weather->setData($this->helper->rearrangeData($weatherDataFromAPI));
        $this->weatherRepositoryInterface->save($weather);
        return $this;
    }
}

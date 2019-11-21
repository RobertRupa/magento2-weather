<?php

namespace RobertRupa\Weather\Model;

use RobertRupa\Weather\Api\Data\WeatherInterface;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;

class Weather extends AbstractModel implements IdentityInterface, WeatherInterface
{
    const CACHE_TAG = 'robertrupa_weather';

    /**
     * @var WeatherFactory
     */
    private $weatherDataFactory;

    /**
     * @param WeatherFactory $weatherDataFactory
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        WeatherFactory $weatherDataFactory,
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->weatherDataFactory = $weatherDataFactory;
    }

    /**
     * @return void
     */
    public function _construct()
    {
        $this->_init('RobertRupa\Weather\Model\ResourceModel\Weather');
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @inheritDoc
     */
    public function getDate(): string
    {
        return (string)$this->getData(self::DATE);
    }

    /**
     * @inheritDoc
     */
    public function setDate(string $date): void
    {
        $this->setData(self::DATE, $date);
    }

    /**
     * @inheritDoc
     */
    public function getLocalization(): ?string
    {
        return (string)$this->getData(self::LOCALIZATION);
    }

    /**
     * @inheritDoc
     */
    public function setLocalization(string $localization): void
    {
        $this->setData(self::LOCALIZATION, $localization);
    }

    /**
     * @inheritDoc
     */
    public function getTemp(): ?float
    {
        return $this->getData(self::TEMP);
    }

    /**
     * @inheritDoc
     */
    public function setTemp($temp): void
    {
        $this->setData(self::TEMP, $temp);
    }

    /**
     * @inheritDoc
     */
    public function getTempMin(): ?float
    {
        return $this->getData(self::TEMP_MIN);
    }

    /**
     * @inheritDoc
     */
    public function setTempMin($temp_min): void
    {
        $this->setData(self::TEMP_MIN, $temp_min);
    }

    /**
     * @inheritDoc
     */
    public function getTempMax(): ?float
    {
        return $this->getData(self::TEMP_MAX);
    }

    /**
     * @inheritDoc
     */
    public function setTempMax($temp_max): void
    {
        $this->setData(self::TEMP_MAX, $temp_max);
    }

    /**
     * @return int
     */
    public function getPressure(): ?int
    {
        return $this->getData(self::PRESSURE);
    }

    /**
     * @inheritDoc
     */
    public function setPressure($pressure): void
    {
        $this->setData(self::PRESSURE, $pressure);
    }

    /**
     * @inheritDoc
     */
    public function getHumidity(): ?int
    {
        return $this->getData(self::HUMIDITY);
    }

    /**
     * @inheritDoc
     */
    public function setHumidity($humidity): void
    {
        $this->setData(self::HUMIDITY, $humidity);
    }

    /**
     * @inheritDoc
     */
    public function getSunrise(): ?string
    {
        return (string)$this->getData(self::SUNRISE);
    }

    /**
     * @inheritDoc
     */
    public function setSunrise($sunrise): void
    {
        $this->setData(self::SUNRISE, $sunrise);
    }

    /**
     * @inheritDoc
     */
    public function getSunset(): ?string
    {
        return (string)$this->getData(self::SUNSET);
    }

    /**
     * @inheritDoc
     */
    public function setSunset($sunset): void
    {
        $this->setData(self::SUNSET, $sunset);
    }

    /**
     * @inheritDoc
     */
    public function getClouds(): ?int
    {
        return $this->getData(self::CLOUDS);
    }

    /**
     * @inheritDoc
     */
    public function setClouds($clouds): void
    {
        $this->setData(self::CLOUDS, $clouds);
    }

    /**
     * @inheritDoc
     */
    public function getVisibility(): ?int
    {
        return $this->getData(self::VISIBILITY);
    }

    /**
     * @inheritDoc
     */
    public function setVisibility($visibility): void
    {
        $this->setData(self::VISIBILITY, $visibility);
    }

    /**
     * @inheritDoc
     */
    public function getWindSpeed(): ?float
    {
        return $this->getData(self::WIND_SPEED);
    }

    /**
     * @inheritDoc
     */
    public function setWindSpeed($wind_speed): void
    {
        $this->setData(self::WIND_SPEED, $wind_speed);
    }

    /**
     * @inheritDoc
     */
    public function getWindGust(): ?float
    {
        return $this->getData(self::WIND_GUST);
    }

    /**
     * @inheritDoc
     */
    public function setWindGust($wind_gust): void
    {
        $this->setData(self::WIND_GUST, $wind_gust);
    }

    /**
     * @inheritDoc
     */
    public function getWindDeg(): ?int
    {
        return $this->getData(self::WIND_DEG);
    }

    /**
     * @inheritDoc
     */
    public function setWindDeg($wind_deg): void
    {
        $this->setData(self::WIND_DEG, $wind_deg);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(string $description): void
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getMain(): ?string
    {
        return $this->getData(self::MAIN);
    }

    /**
     * @inheritDoc
     */
    public function setMain(string $main): void
    {
        $this->setData(self::MAIN, $main);
    }

    /**
     * @inheritDoc
     */
    public function getIcon(): ?string
    {
        return $this->getData(self::ICON);
    }

    /**
     * @inheritDoc
     */
    public function setIcon(string $icon): void
    {
        $this->setData(self::ICON, $icon);
    }
}
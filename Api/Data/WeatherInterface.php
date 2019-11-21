<?php

namespace RobertRupa\Weather\Api\Data;

interface WeatherInterface
{
    const ID = 'entity_id';
    const DATE = 'date';
    const LOCALIZATION = 'localization';
    const TEMP = 'temp';
    const TEMP_MIN = 'temp_min';
    const TEMP_MAX = 'temp_max';
    const PRESSURE = 'pressure';
    const HUMIDITY = 'humidity';
    const SUNRISE = 'sunrise';
    const SUNSET = 'sunset';
    const CLOUDS = 'clouds';
    const VISIBILITY = 'visibility';
    const WIND_SPEED = 'wind_speed';
    const WIND_GUST = 'wind_gust';
    const WIND_DEG = 'wind_deg';
    const DESCRIPTION = 'description';
    const MAIN = 'main';
    const ICON = 'icon';

    /**
     * @return int
     */
    public function getId();
    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getDate(): string;
    /**
     * @param string $date
     * @return void
     */
    public function setDate(string $date): void;

    /**
     * @return string|null
     */
    public function getLocalization(): ?string;
    /**
     * @param string $localization
     * @return void
     */
    public function setLocalization(string $localization): void;

    /**
     * @return float|null
     */
    public function getTemp(): ?float;
    /**
     * @param float $temp
     * @return void
     */
    public function setTemp($temp): void;

    /**
     * @return float|null
     */
    public function getTempMin(): ?float;
    /**
     * @param float $temp_min
     * @return void
     */
    public function setTempMin($temp_min): void;

    /**
     * @return float|null
     */
    public function getTempMax(): ?float;
    /**
     * @param float $temp_max
     * @return void
     */
    public function setTempMax($temp_max): void;

    /**
     * @return int|null
     */
    public function getPressure(): ?int;
    /**
     * @param int $pressure
     * @return void
     */
    public function setPressure($pressure): void;

    /**
     * @return int|null
     */
    public function getHumidity(): ?int;
    /**
     * @param int $humidity
     * @return void
     */
    public function setHumidity($humidity): void;

    /**
     * @return string|null
     */
    public function getSunrise(): ?string;
    /**
     * @param string $sunrise
     * @return void
     */
    public function setSunrise($sunrise): void;

    /**
     * @return string|null
     */
    public function getSunset(): ?string;
    /**
     * @param string $sunset
     * @return void
     */
    public function setSunset($sunset): void;

    /**
     * @return int|null
     */
    public function getClouds(): ?int;
    /**
     * @param int $clouds
     * @return void
     */
    public function setClouds($clouds): void;

    /**
     * @return int|null
     */
    public function getVisibility(): ?int;
    /**
     * @param int $visibility
     * @return void
     */
    public function setVisibility($visibility): void;

    /**
     * @return float|null
     */
    public function getWindSpeed(): ?float;
    /**
     * @param float $wind_speed
     * @return void
     */
    public function setWindSpeed($wind_speed): void;

    /**
     * @return float|null
     */
    public function getWindGust(): ?float;
    /**
     * @param float $wind_gust
     * @return void
     */
    public function setWindGust($wind_gust): void;

    /**
     * @return int|null
     */
    public function getWindDeg(): ?int;
    /**
     * @param int $wind_deg
     * @return void
     */
    public function setWindDeg($wind_deg): void;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;
    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void;

    /**
     * @return string|null
     */
    public function getMain(): ?string;
    /**
     * @param string $main
     * @return void
     */
    public function setMain(string $main): void;

    /**
     * @return string|null
     */
    public function getIcon(): ?string;
    /**
     * @param string $icon
     * @return void
     */
    public function setIcon(string $icon): void;
}
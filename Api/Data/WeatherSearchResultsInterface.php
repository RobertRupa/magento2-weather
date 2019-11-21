<?php

namespace RobertRupa\Weather\Api\Data;

interface WeatherSearchResultsInterface
{
    /**
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface[]
     */
    public function getItems();
    /**
     * @param \RobertRupa\Weather\Api\Data\WeatherInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
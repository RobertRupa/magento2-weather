<?php

namespace RobertRupa\Weather\Api\Data;

interface WeatherRepositoryInterface
{
    /**
     * @param WeatherInterface $weather
     * @return void
     */
    public function save(\RobertRupa\Weather\Api\Data\WeatherInterface $weather);

    /**
     * @param int $id
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface
     */
    public function getById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \RobertRupa\Weather\Api\Data\WeatherSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * @param \RobertRupa\Weather\Api\Data\WeatherInterface $weather
     * @return void
     */
    public function delete(\RobertRupa\Weather\Api\Data\WeatherInterface $weather);

    /**
     * @param int $id
     * @return \RobertRupa\Weather\Api\Data\WeatherSearchResultsInterface
     */
    public function deleteById($id);

    /**
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface
     */
    public function getLast();
}
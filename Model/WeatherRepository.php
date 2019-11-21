<?php

namespace RobertRupa\Weather\Model;

use RobertRupa\Weather\Api\Data\WeatherInterface;
use RobertRupa\Weather\Api\Data\WeatherRepositoryInterface;
use RobertRupa\Weather\Api\Data\WeatherSearchResultsInterfaceFactory;
use RobertRupa\Weather\Api\Data\WeatherSearchResultsInterface;
use RobertRupa\Weather\Model\ResourceModel\Weather as WeatherResource;
use RobertRupa\Weather\Model\ResourceModel\Weather\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;

class WeatherRepository implements WeatherRepositoryInterface
{

    /**
     * @var WeatherResource
     */
    private $weatherResource;

    /**
     * @var WeatherFactory
     */
    private $weatherFactory;

    /**
     * @var CollectionFactory
     */
    private $weatherCollectionFactory;

    /**
     * @var WeatherSearchResultsInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @param WeatherResource $weatherResource
     * @param WeatherFactory $weatherFactory
     * @param CollectionFactory $weatherCollectionFactory
     * @param WeatherSearchResultsInterfaceFactory $searchResultFactory
     */
    public function __construct(
        WeatherResource $weatherResource,
        WeatherFactory $weatherFactory,
        CollectionFactory $weatherCollectionFactory,
        WeatherSearchResultsInterfaceFactory $searchResultFactory
    ) {
        $this->weatherResource = $weatherResource;
        $this->weatherFactory = $weatherFactory;
        $this->weatherCollectionFactory = $weatherCollectionFactory;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @param \RobertRupa\Weather\Api\Data\WeatherInterface $weather
     * @return void
     * @throws \Exception
     * @throws AlreadyExistsException
     */
    public function save(\RobertRupa\Weather\Api\Data\WeatherInterface $weather)
    {
        /** @var Weather $weatherModel */
        $weatherModel = $this->weatherFactory->create();
        if ($weather->getId()) {
            $this->weatherResource->load($weatherModel, $weather->getId());
        }
        $weatherModel->setData($weather->getData());
        $this->weatherResource->save($weatherModel);
    }

    /**
     * @param int $id
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id): \RobertRupa\Weather\Api\Data\WeatherInterface
    {
        /** @var Weather $weatherModel */
        $weatherModel = $this->weatherFactory->create();
        $this->weatherResource->load($weatherModel, $id);
        if (!$weatherModel->getId()) {
            throw new NoSuchEntityException();
        }
        return $weatherModel;
    }

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \RobertRupa\Weather\Api\Data\WeatherSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        /** @var WeatherResource\Collection $collection */
        $collection = $this->weatherCollectionFactory->create();
        //Helper methods for translating search criteria to collection filters etc.
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        /** @var WeatherSearchResultsInterface $searchResult */
        $searchResult = $this->searchResultFactory->create();
        return $this->buildSearchResult($searchCriteria, $searchResult, $collection);
    }

    /**
     * @param \RobertRupa\Weather\Api\Data\WeatherInterface $weather
     * @return void
     * @throws \Exception
     */
    public function delete(\RobertRupa\Weather\Api\Data\WeatherInterface $weather)
    {
        $this->deleteById($weather->getId());
    }

    /**
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteById($id)
    {
        /** @var Weather $weatherModel */
        $weatherModel = $this->weatherFactory->create();
        $this->weatherResource->load($weatherModel, $id);
        $this->weatherResource->delete($weatherModel);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param WeatherResource\Collection $collection
     */
    private function addFiltersToCollection(
        SearchCriteriaInterface $searchCriteria,
        WeatherResource\Collection $collection
    ) {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * @return \RobertRupa\Weather\Api\Data\WeatherInterface
     */
    public function getLast(): WeatherInterface
    {
        /** @var WeatherResource\Collection $collection */
        $collection = $this->weatherCollectionFactory->create();
        /**
         * @var $weather \RobertRupa\Weather\Api\Data\WeatherInterface
         */
        $weather = $collection->getLastItem();
        return $weather;

    }
}
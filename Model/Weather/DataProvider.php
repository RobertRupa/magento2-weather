<?php

namespace RobertRupa\Weather\Model\Weather;

use RobertRupa\Weather\Model\ResourceModel\Weather\CollectionFactory;
use RobertRupa\Weather\Model\ResourceModel\Weather\Collection;
use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        /** @var Collection collection */
        $this->collection = $collectionFactory->create();
    }
    /**
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $weatherLogs = $this->collection->getItems();
        $this->loadedData = [];
        foreach ($weatherLogs as $weather) {
            $this->loadedData[$weather->getId()]['weather'] = $weather->getData();
        }
        return $this->loadedData;
    }
}
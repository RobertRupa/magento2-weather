<?php

namespace RobertRupa\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'RobertRupa\Weather\Model\Weather',
            'RobertRupa\Weather\Model\ResourceModel\Weather'
        );
    }
}
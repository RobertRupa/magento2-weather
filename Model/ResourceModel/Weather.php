<?php

namespace RobertRupa\Weather\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Weather extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('robertrupa_weather', 'entity_id');
    }
}
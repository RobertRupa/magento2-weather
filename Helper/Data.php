<?php

namespace RobertRupa\Weather\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

class Data extends AbstractHelper
{
    /**
     * @var TimezoneInterface
     */
    private $magentoDate;

    /**
     * Data constructor.
     * @param Context $context
     * @param TimezoneInterface $magentoDate
     */
    public function __construct(
        Context $context,
        TimezoneInterface $magentoDate
    ){
        parent::__construct($context);
        $this->magentoDate = $magentoDate;
    }

    /**
     * @param \stdClass
     * @return array
     */
    public function rearrangeData(\stdClass $data)
    {
        $currentStoreDate = $this->magentoDate->date();
        $currentStoreDate = $currentStoreDate->format('Y-m-d H:m:s');

        $weatherData = [
            'date'  => $currentStoreDate,
            'localization'    => $data->name,
            'temp'            => $data->main->temp,
            'temp_min'        => $data->main->temp_min,
            'temp_max'        => $data->main->temp_max,
            'pressure'        => $data->main->pressure,
            'humidity'        => $data->main->humidity,
            'sunrise'         => $data->sys->sunrise,
            'sunset'          => $data->sys->sunset,
            'clouds'          => $data->clouds->all,
            'visibility'      => $data->visibility,
            'wind_speed'      => $data->wind->speed,
            'wind_deg'        => $data->wind->deg,
            'description'     => $data->weather[0]->description,
            'main'            => $data->weather[0]->main,
            'icon'            => $data->weather[0]->icon
        ];
        return $weatherData;
    }
}
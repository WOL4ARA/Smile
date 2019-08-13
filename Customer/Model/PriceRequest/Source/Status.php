<?php

namespace Smile\Customer\Model\PriceRequest\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Smile\Customer\Model\PriceRequest;

/**
 * Class Status
 *
 * @package Smile\Customer\Model\PriceRequest\Source\Status
 */
class Status implements OptionSourceInterface
{
    /**
     * Price Request
     *
     * @var PriceRequest
     */
    private $priceRequest;

    /**
     * Status constructor
     *
     * @param PriceRequest $priceRequest
     */
    public function __construct(PriceRequest $priceRequest)
    {
        $this->priceRequest = $priceRequest;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->priceRequest->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}

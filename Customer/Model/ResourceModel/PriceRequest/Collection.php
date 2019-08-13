<?php

namespace Smile\Customer\Model\ResourceModel\PriceRequest;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package Smile\Customer\Model\ResourceModel\PriceRequest\Collection
 *
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Smile\Customer\Model\PriceRequest', 'Smile\Customer\Model\ResourceModel\PriceRequest');
    }
}

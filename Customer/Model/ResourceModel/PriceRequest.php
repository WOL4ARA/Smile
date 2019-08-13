<?php

namespace Smile\Customer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Price request
 *
 * @package Smile\Customer\Model\ResourceModel\PriceRequest
 */
class PriceRequest extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('smile_customer_price_request', 'id');
    }
}

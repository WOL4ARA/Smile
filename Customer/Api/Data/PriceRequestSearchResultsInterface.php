<?php

namespace Smile\Customer\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface PriceRequestSearchResultsInterface
 *
 * @package Smile\Customer\Api\Data
 */
interface PriceRequestSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get price request list
     *
     * @return \Smile\Customer\Api\Data\PriceRequestInterface[]
     */
    public function getItems();

    /**
     * Set price request list
     *
     * @param \Smile\Customer\Api\Data\PriceRequestInterface[] $items
     *
     * @return PriceRequestSearchResultsInterface
     */
    public function setItems(array $items);
}

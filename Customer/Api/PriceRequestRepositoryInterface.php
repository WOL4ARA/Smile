<?php

namespace Smile\Customer\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Smile\Customer\Api\Data\PriceRequestInterface;

/**
 * Interface PriceRequestRepositoryInterface
 *
 * @package Smile\Customer\Api
 */
interface PriceRequestRepositoryInterface
{
    /**
     * Retrieve a price request by it's id
     *
     * @param $objectId
     *
     * @return PriceRequestRepositoryInterface
     */
    public function getById($objectId);

    /**
     * Retrieve price request which match a specified criteria.
     *
     * @param SearchCriteriaInterface|null $searchCriteria
     *
     * @return \Magento\Framework\Api\SearchResults
     */
    public function getList(SearchCriteriaInterface $searchCriteria = null);

    /**
     * Save price request
     *
     * @param PriceRequestInterface $object
     *
     * @return PriceRequestRepositoryInterface
     */
    public function save(PriceRequestInterface $object);

    /**
     * Delete a price request by its id
     *
     * @param int $objectId
     *
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function deleteById($objectId);
}

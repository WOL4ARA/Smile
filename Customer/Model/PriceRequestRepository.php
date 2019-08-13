<?php

namespace Smile\Customer\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Smile\Customer\Api\Data;
use Smile\Customer\Api\PriceRequestRepositoryInterface;
use Smile\Customer\Model\ResourceModel\PriceRequest as ResourcePriceRequest;
use Smile\Customer\Model\ResourceModel\PriceRequest\CollectionFactory as PriceRequestCollectionFactory;

/**
 * Class PriceRequestRepository
 *
 * @package Smile\Customer\Model\PriceRequestRepository
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PriceRequestRepository implements PriceRequestRepositoryInterface
{
    /**
     * Resource price request
     *
     * @var ResourcePriceRequest
     */
    private $resource;

    /**
     * Price request factory
     *
     * @var PriceRequestFactory
     */
    private $priceRequestFactory;

    /**
     * Price request collection factory
     *
     * @var PriceRequestCollectionFactory
     */
    private $priceRequestCollectionFactory;

    /**
     * Price request search results interface factory
     *
     * @var PriceRequestSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * PriceRequestRepository constructor
     *
     * @param ResourcePriceRequest                           $resource
     * @param PriceRequestFactory                            $PriceRequestFactory
     * @param PriceRequestCollectionFactory                  $PriceRequestCollectionFactory
     * @param Data\PriceRequestSearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        ResourcePriceRequest $resource,
        PriceRequestFactory $priceRequestFactory,
        PriceRequestCollectionFactory $priceRequestCollectionFactory,
        Data\PriceRequestSearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->priceRequestFactory = $priceRequestFactory;
        $this->priceRequestCollectionFactory = $priceRequestCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Save Price request data
     *
     * @param \Smile\Customer\Api\Data\PriceRequestInterface $priceRequest
     *
     * @return PriceRequest
     *
     * @throws CouldNotSaveException
     */
    public function save(Data\PriceRequestInterface $priceRequest)
    {
        try {
            $this->resource->save($priceRequest);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $priceRequest;
    }

    /**
     * Load Price request data by given Price request Identity
     *
     * @param string $priceRequestId
     *
     * @return PriceRequest
     *
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($priceRequestId)
    {
        $priceRequest = $this->priceRequestFactory->create();
        $this->resource->load($priceRequest, $priceRequestId);
        if (!$priceRequest->getId()) {
            throw new NoSuchEntityException(__('Price request with id "%1" does not exist.', $priceRequestId));
        }

        return $priceRequest;
    }

    /**
     * Load Price request data collection by given search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     *
     * @return \Smile\Customer\Model\ResourceModel\PriceRequest\Collection
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function getList(SearchCriteriaInterface $criteria = null)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $collection = $this->priceRequestCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $priceRequest = [];
        /** @var Data\PriceRequestInterface $priceRequestModel */
        foreach ($collection as $priceRequestModel) {
            $priceRequest[] = $priceRequestModel;
        }
        $searchResults->setItems($priceRequest);

        return $searchResults;
    }

    /**
     * Delete Price request
     *
     * @param \Smile\Customer\Api\Data\PriceRequestInterface $priceRequest
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     */
    public function delete(Data\PriceRequestInterface $priceRequest)
    {
        try {
            $this->resource->delete($priceRequest);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }

    /**
     * Delete Price request by given Price request Identity
     *
     * @param string $priceRequestId
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($priceRequestId)
    {
        return $this->delete($this->getById($priceRequestId));
    }
}

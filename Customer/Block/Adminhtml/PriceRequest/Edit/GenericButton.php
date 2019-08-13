<?php

namespace Smile\Customer\Block\Adminhtml\PriceRequest\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Smile\Customer\Api\PriceRequestRepositoryInterface;

/**
 * Class GenericButton
 *
 * @package Smile\Customer\Block\Adminhtml\PriceRequest\Edit
 */
class GenericButton
{
    /**
     * Context
     *
     * @var Context
     */
    private $context;

    /**
     * Price request repository interface
     *
     * @var PriceRequestRepositoryInterface
     */
    private $priceRequestRepository;

    /**
     * GenericButton constructor
     *
     * @param Context                 $context
     * @param PriceRequestRepositoryInterface $priceRequestRepository
     */
    public function __construct(
        Context $context,
        PriceRequestRepositoryInterface $priceRequestRepository
    ) {
        $this->context = $context;
        $this->priceRequestRepository = $priceRequestRepository;
    }

    /**
     * Get Price Request ID
     *
     * @return int
     */
    public function getPriceRequestId()
    {
        try {
            $modelId = $this->context->getRequest()->getParam('id');

            return $this->priceRequestRepository->getById($modelId)->getId();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array  $params
     *
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}

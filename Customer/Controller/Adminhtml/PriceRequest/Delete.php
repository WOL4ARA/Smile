<?php

namespace Smile\Customer\Controller\Adminhtml\PriceRequest;

use Magento\Backend\App\Action;
use Smile\Customer\Api\PriceRequestRepositoryInterface;

/**
 * Class Delete
 *
 * @package Smile\Customer\Controller\Adminhtml\PriceRequest
 */
class Delete extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Smile_Customer::price_request_delete';

    /**
     * Price request repository interface
     *
     * @var PriceRequestRepositoryInterface
     */
    private $priceRequestRepository;

    /**
     * Delete constructor
     *
     * @param Action\Context                  $context
     * @param PriceRequestRepositoryInterface $priceRequestRepository
     */
    public function __construct(
        Action\Context                  $context,
        PriceRequestRepositoryInterface $priceRequestRepository
    ) {
        $this->priceRequestRepository = $priceRequestRepository;
        parent::__construct($context);
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $priceRequestRepository = $this->priceRequestRepository;
                $priceRequestRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('The price request has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addErrorMessage(__('We can\'t find a price request to delete.'));

        return $resultRedirect->setPath('*/*/');
    }
}

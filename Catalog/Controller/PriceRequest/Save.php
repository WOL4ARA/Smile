<?php

namespace Smile\Catalog\Controller\PriceRequest;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Smile\Customer\Model\PriceRequestFactory;
use Smile\Customer\Api\PriceRequestRepositoryInterface;

class Save extends Action
{
    /**
     * @var PriceRequestFactory
     */
    protected $pricerequestFactory;
    /**
     * @var PriceRequestRepositoryInterface
     */
    protected $pricerequestRepository;
    /**
     * Save constructor.
     * @param Context $context
     * @param PriceRequestFactory $pricerequestFactory
     * @param PriceRequestFactoryInterface $pricerequestRepository
     */
    public function __construct(
        Context $context,
        PriceRequestFactory $pricerequestFactory,
        PriceRequestRepositoryInterface $pricerequestRepository
    )
    {
        $this->pricerequestFactory = $pricerequestFactory;
        $this->pricerequestRepository = $pricerequestRepository;
        parent::__construct($context);
    }
    /**
     * Save action
     *
     * @return void
     *
     * @throws \Exception
     */
    public function execute()
    {
        try{
            if ($this->getRequest()->isAjax()) {
                $data = $this->getRequest()->getParams();
                $model = $this->pricerequestFactory->create();
                $model->setData($data);
                $this->pricerequestRepository->save($model);
                $this->messageManager->addSuccessMessage(__('Your Request Price has been saved'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
    }
}

<?php

namespace Smile\Customer\Model\PriceRequest;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Store\Model\StoreManagerInterface;
use Smile\Customer\Model\ResourceModel\PriceRequest\CollectionFactory;

/**
 * Class DataProvider
 *
 * @package Smile\Customer\Model\PriceRequest\DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Price request collection
     *
     * @var \Smile\Customer\Model\ResourceModel\PriceRequest\Collection
     */
    protected $collection;

    /**
     * Data persistor interface
     *
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * Loaded data
     *
     * @var array
     */
    private $loadedData;

    /**
     * Store manager
     *
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * DataProvider constructor
     *
     * @param string                 $name
     * @param string                 $primaryFieldName
     * @param string                 $requestFieldName
     * @param CollectionFactory      $priceRequestCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface  $storeManager
     * @param array                  $meta
     * @param array                  $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $priceRequestCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $priceRequestCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        $this->storeManager = $storeManager;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if ($this->loadedData === null) {
            $this->loadedData = [];
            $items = $this->collection->getItems();

            foreach ($items as $priceRequest)
                $this->loadedData[$priceRequest->getId()] = $priceRequest->getData();

            $data = $this->dataPersistor->get('smile_customer_price_request');
            if (!empty($data)) {
                $priceRequest = $this->collection->getNewEmptyItem();
                $priceRequest->setData($data);
                $this->loadedData[$priceRequest->getId()] = $priceRequest->getData();
                $this->dataPersistor->clear('smile_customer_price_request');
            }
        }

        return $this->loadedData;
    }
}

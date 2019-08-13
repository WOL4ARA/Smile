<?php

namespace Smile\Customer\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Smile\Customer\Api\Data\PriceRequestInterface;

/**
 * Class PriceRequest
 *
 * @package Smile\Customer\Model\PriceRequest
 *
 */
class PriceRequest extends AbstractModel implements PriceRequestInterface, IdentityInterface
{
    /**#@+
     * Price requests Statuses
     */
    const STATUS_NEW = 1;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_CLOSED = 3;
    /**#@-*/

    /**
     * Customer price request cache tag
     */
    const CACHE_TAG = 'smile_customer_price_request';

    /**
     * Cache tag
     *
     * @var string
     */
    public $cacheTag = 'smile_customer_price_request';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    public $eventPrefix = 'smile_customer_price_request';

    /**
     * Price request construct
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Smile\Customer\Model\ResourceModel\PriceRequest');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Retrieve price request id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Get e-mail
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Get product SKU
     *
     * @return string
     */
    public function getProductSku()
    {
        return $this->getData(self::PRODUCT_SKU);
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    /**
     * Get creating time
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return PriceRequestInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PriceRequestInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Set e-mail
     *
     * @param string $email
     *
     * @return PriceRequestInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Set product SKU
     *
     * @param string $productSku
     *
     * @return PriceRequestInterface
     */
    public function setProductSku($productSku)
    {
        return $this->setData(self::PRODUCT_SKU, $productSku);
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return PriceRequestInterface
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * Set creating time
     *
     * @param string $createdAt
     *
     * @return PriceRequestInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Set status
     *
     * @param int $status
     *
     * @return PriceRequestInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return PriceRequestInterface
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Prepare price requests statuses.
     * Available event customer_price_request_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_NEW => __('New'), self::STATUS_IN_PROGRESS => __('In progress'), self::STATUS_CLOSED => __('Closed')];
    }
}

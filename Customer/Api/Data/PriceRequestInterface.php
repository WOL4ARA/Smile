<?php

namespace Smile\Customer\Api\Data;
/**
 * Interface PriceRequestInterface
 *
 * @package Smile\Customer\Api\Data
 */
interface PriceRequestInterface
{
    /**
     * Table name
     */
    const TABLE_NAME = 'smile_customer_price_request';

    /**#@+
     * Constants defined for keys of data array.
     */
    const ID          = 'id';
    const NAME        = 'name';
    const EMAIL       = 'email';
    const PRODUCT_SKU = 'product_sku';
    const COMMENT     = 'comment';
    const CREATED_AT  = 'created_at';
    const STATUS      = 'status';
    const ANSWER      = 'answer';
    /**#@-*/

    /**
     * Get ID
     *
     * @return int
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Get e-mail
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get product SKU
     *
     * @return string
     */
    public function getProductSku();

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment();

    /**
     * Get creating time
     *
     * @return string
     */
    public function getCreatedAt();

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus();

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return PriceRequestInterface
     */
    public function setId($id);

    /**
     * Set name
     *
     * @param string $name
     *
     * @return PriceRequestInterface
     */
    public function setName($name);

    /**
     * Set e-mail
     *
     * @param string $email
     *
     * @return PriceRequestInterface
     */
    public function setEmail($email);

    /**
     * Set product SKU
     *
     * @param string $productSku
     *
     * @return PriceRequestInterface
     */
    public function setProductSku($productSku);

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return PriceRequestInterface
     */
    public function setComment($comment);

    /**
     * Set creating time
     *
     * @param string $createdAt
     *
     * @return PriceRequestInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Set status
     *
     * @param int $status
     *
     * @return PriceRequestInterface
     */
    public function setStatus($status);

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return PriceRequestInterface
     */
    public function setAnswer($answer);
}

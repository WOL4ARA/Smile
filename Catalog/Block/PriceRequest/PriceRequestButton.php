<?php

namespace Smile\Catalog\Block\PriceRequest;

use Magento\Framework\View\Element\Template;

class PriceRequestButton extends Template
{
    /**
     * Get button label
     *
     * @return string
     */
    public function getButtonLabel()
    {
        return __('Request Price');
    }
}

<?php

namespace Juno\Theme\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class PhoneNumber implements ArgumentInterface
{

    public function __construct(
        private  ScopeConfigInterface $scopeConfig,
    ){}

    public function getPhoneNumber():string
    {
        return $this->scopeConfig->getValue('general/store_information/phone');
    }


}
<?php

namespace Juno\Theme\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class StoreHours implements ArgumentInterface
{

        public function __construct(
            private ScopeConfigInterface $scopeConfig,
        )
        {}


       public function getStoreHours():string
       {
           return $this->scopeConfig->getValue('general/store_information/hours');
       }


}
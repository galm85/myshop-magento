<?php

namespace Macademy\InventoryFulfillment\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{

    public function __construct(
        private PageFactory $pageFactory,
    ){}


    /**
     * @return Page
     */
    public function execute():Page
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->set(__('Shipping Plan'));
        return $page;
    }
}
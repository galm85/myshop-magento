<?php

namespace Macademy\InventoryFulfillment\Controller\Index;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;

class Post implements HttpPostActionInterface
{

    public function __construct(
       private JsonFactory $jsonFactory,
    ){}

    public function execute():Json
    {
        $json = $this->jsonFactory->create();
        return $json->setData(['success'=>true]);
    }
}
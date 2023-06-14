<?php

namespace MageMastery\FirstLayout\Controller\Page;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class View  implements HttpGetActionInterface
{


    public function execute()
    {
        /** @var Page $resultPage*/
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

<?php

namespace Gal\Gwd\Block;

use Magento\Catalog\Model\Product;
use Magento\Framework\View\Element\Template;
use Magento\Review\Model\ResourceModel\Review\CollectionFactory as ReviewCollectionFactory;
use Magento\Framework\Registry;

class Review extends Template
{
    protected $reviewCollectionFactory;
    protected $_registry;

    public function __construct(
        Template\Context $context,
        ReviewCollectionFactory $reviewCollectionFactory,
        Registry $registry,
        array $data = []
    ) {
        $this->reviewCollectionFactory = $reviewCollectionFactory;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function getProductReviews()
    {
        /** @var Product $product */
        $product = $this->getCurrentProduct();

        /** @var \Magento\Review\Model\ResourceModel\Review\Collection $reviews */
        $reviews = $this->reviewCollectionFactory->create();
        $reviews->addStoreFilter($this->_storeManager->getStore()->getId())
            ->addStatusFilter(\Magento\Review\Model\Review::STATUS_APPROVED)
            ->addEntityFilter('product', $product->getId())
            ->setDateOrder();


        return $reviews;
    }

    protected function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
}

<?php

namespace Gal\Gwd\Block;

use Magento\Catalog\Model\ProductFactory;
use Magento\Backend\Block\Template;
use Magento\Framework\Registry;


class Product extends Template
{

    protected $productFactory;
    protected $registry;

    public function __construct(
        Template\Context $context,
        ProductFactory $productFactory,
        Registry $registry,
        array $data = [],
    ){
        parent::__construct($context,$data);
        $this->productFactory = $productFactory;
        $this->registry = $registry;
    }


    public function getFormattedPrice():string{
       return "$" . strval(number_format($this->getCurrentProduct()->getData('price'),2));
    }

    public function getSku(){
        return $this->getCurrentProduct()->getSku();
    }

    public function renderDescriptionColorful(){

        $product = $this->getCurrentProduct();
        $text = $product->getData('description');
        $length = strlen($text);

        $output = '<p>';


        for ($i = 0; $i < $length; $i++) {
            if ($i % 2 == 0) {
                $output .= $text[$i];
            } else {
                $output .= "<span style='color: red;'>" . $text[$i] . "</span>";
            }
        }

        $output .= "</p>";

        return $output;

}



    public function getCurrentProduct(){
        $currentProduct = $this->registry->registry('current_product');
        if($currentProduct){
            $product = $this->productFactory->create()->load($currentProduct->getId());
            return $product;
        }
        return null;
    }




}

<?php

namespace Gal\Gwd\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class InstallAttributeCountry implements UpgradeDataInterface
{


    public function __construct(
        private EavSetupFactory $eavSetupFactory
    ){}

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();


            $eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);

            $eavSetup->addAttribute(
                Product::ENTITY,
                'Country_of_origin',
                [
                    'type'=>'string',
                    'label'=>'Country of Origin',
                    'input'=>'text',
                    'requierd'=>false,
                    'sort_order'=>100,
                    'global'=>ScopedAttributeInterface::SCOPE_GLOBAL,
                    'group'=>'General'
                ]
            );

        $setup->endSetup();
    }
}

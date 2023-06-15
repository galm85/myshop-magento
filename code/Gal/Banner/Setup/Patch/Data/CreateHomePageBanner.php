<?php

namespace Gal\Banner\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Cms\Model\BlockFactory;

class CreateHomePageBanner implements DataPatchInterface
{


    public function __construct(
        private BlockFactory $blockFactory,
    ){}

    public function apply()
    {
        $cmsBlock = $this->blockFactory->create();
        $cmsBlockId = 'homepage.banner';
        if(!$cmsBlock->load($cmsBlockId,'identifier')->getId()){
            $cmsBlockTitle = 'HomePage Banner';
            $cmsBlockContent = <<<EOD
    <div class="homepage-banner">
        <img src="https://img.freepik.com/free-vector/business-presentation-banner-with-blue-geometric-shape_1017-32330.jpg" alt="home page banner" class="homepage-banner__image">
        <div class="homepage-banner__content">
            <h3 style="color:red" class="homepage-banner__title">Title</h3>
            <a href="{{config path='web/unsecure/base_url'}}blog" class="homepage-banner__btn">To Blog</a>
        </div>
    </div>
EOD;

            $block = [
                'title' => $cmsBlockTitle,
                'identifier'=> $cmsBlockId,
                'content'=>$cmsBlockContent,
                'store'=>[0],
                'is_active'=>1
            ];

            $cmsBlock->setData($block)->save();

        }
    }









    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }


}

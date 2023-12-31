<?php

namespace Macademy\Blog\Setup\Patch\Data;

use Macademy\Blog\Model\PostFactory;
use Macademy\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class PopulateBlogPosts implements DataPatchInterface
{


    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository
    )
    {}


    public static function getDependencies():array
    {
        return [];
    }

    public function getAliases():array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $post = $this->postFactory->create();
        $post->setData([
                'title'=>'First Post',
                'content'=>'This is my first post'
        ]);

        $this->postRepository->save($post);

        $this->moduleDataSetup->endSetup();
    }
}

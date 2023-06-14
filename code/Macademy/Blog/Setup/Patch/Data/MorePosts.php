<?php

namespace Macademy\Blog\Setup\Patch\Data;

use Macademy\Blog\Model\PostFactory;
use Macademy\Blog\Api\PostRepositoryInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;


class MorePosts implements DataPatchInterface
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


        $posts = [
            [
                'title'=>'generate more than 5000 records',
                'content'=>'You can now generate more than 5000 records per file using the API with the new ?background=true parameter.'
            ],
            [
                'title'=>'generate using AI',
                'content'=>'You can now generate fields on any topic using AI.'
            ],
            [
                'title'=>'Added airport data',
                'content'=>'You can now generate datasets using JSON and import them into other schemas using the Dataset Column type.'
            ],
            [
                'title'=>'Added support for InfluxDB',
                'content'=>'You can now create a dataset directly from a schema. You no longer need to download and reupload generated data to create a dataset!'
            ]
        ];

        foreach ($posts as $postData){
            $post = $this->postFactory->create();
            $post->setData($postData);
            $this->postRepository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}

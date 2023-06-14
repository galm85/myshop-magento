<?php

namespace Macademy\Blog\Model\ResourceModel\Post;

use Macademy\Blog\Model\Post;
use Macademy\Blog\Model\ResourceModel\Post as PostResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class,PostResource::class);
    }
}

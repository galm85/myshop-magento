<?php

namespace Gal\Review\Block;

use Magento\Backend\Block\Template;

class Review extends Template
{

    public function getReviews()
    {
        return [
            [ 'id'=>1,'title'=>'Review 1','content'=>'content1'],
            [ 'id'=>2,'title'=>'Review 2','content'=>'content2'],
            [ 'id'=>3,'title'=>'Review 3','content'=>'content3'],
            [ 'id'=>4,'title'=>'Review 4','content'=>'content4'],

        ];
    }

}

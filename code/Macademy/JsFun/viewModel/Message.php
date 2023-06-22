<?php

namespace Macademy\JsFun\viewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Message implements ArgumentInterface
{

    public function getMessage(){
        return str_shuffle('This is Shuffel');
    }

}

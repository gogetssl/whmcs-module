<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\UI\View;
use function ModulesGarden\GGSModule\Core\translate;

class CustomErrorPage extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct(string $message)
    {
        parent::__construct();

        $zeroBlock = new \ModulesGarden\GGSModule\Components\CustomErrorPage\CustomErrorPage();
        $zeroBlock->setTitle(translate("customErrorMessages." . $message . '.title'));
        $zeroBlock->setDescription(translate("customErrorMessages." . $message . '.description'));

        $this->addElement($zeroBlock);
    }

}
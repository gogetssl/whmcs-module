<?php

namespace ModulesGarden\ggsmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\ggsmodule\Core\UI\View;
use function ModulesGarden\ggsmodule\Core\translate;

class CustomErrorPage extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct(string $message)
    {
        parent::__construct();

        $zeroBlock = new \ModulesGarden\ggsmodule\Components\CustomErrorPage\CustomErrorPage();
        $zeroBlock->setTitle(translate("customErrorMessages." . $message . '.title'));
        $zeroBlock->setDescription(translate("customErrorMessages." . $message . '.description'));

        $this->addElement($zeroBlock);
    }

}
<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Forms;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class ServerConfiguration extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\GGSModule\Packages\Product\UI\Providers\ServerConfiguration::class;
}
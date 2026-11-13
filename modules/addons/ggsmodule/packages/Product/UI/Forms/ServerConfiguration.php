<?php

namespace ModulesGarden\ggsmodule\Packages\Product\UI\Forms;

use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class ServerConfiguration extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\ggsmodule\Packages\Product\UI\Providers\ServerConfiguration::class;
}
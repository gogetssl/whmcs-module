<?php

namespace ModulesGarden\ggsmodule\Components\MediaLibrary\Elements;

use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;

abstract class RemoveForm extends Form implements AjaxComponentInterface
{
    protected string $providerAction = CrudProvider::ACTION_DELETE;
}

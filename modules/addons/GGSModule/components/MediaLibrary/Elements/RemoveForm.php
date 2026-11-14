<?php

namespace ModulesGarden\GGSModule\Components\MediaLibrary\Elements;

use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

abstract class RemoveForm extends Form implements AjaxComponentInterface
{
    protected string $providerAction = CrudProvider::ACTION_DELETE;
}

<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

class UserDelete extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = UserProvider::class;
    protected string $providerAction = 'delete';

    public function loadHtml(): void
    {
        BuilderCreator::simple($this)
            ->createField(HiddenField::class, 'id');
    }
}

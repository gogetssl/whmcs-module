<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Components\HiddenField\HiddenField;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

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

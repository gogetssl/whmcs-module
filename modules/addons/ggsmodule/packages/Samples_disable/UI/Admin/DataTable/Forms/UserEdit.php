<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\Switcher\Switcher;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

class UserEdit extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = UserProvider::class;
    protected string $providerAction = 'update';

    public function loadHtml(): void
    {
        $builder = BuilderCreator::simple($this);

        $builder->createField(HiddenField::class, 'id');
        $builder->createField(FormInputText::class, 'firstname')
            ->setValidators(['required']);

        $builder->createField(FormInputText::class, 'lastname');
        $builder->createField(Switcher::class, 'taxexempt');
    }
}

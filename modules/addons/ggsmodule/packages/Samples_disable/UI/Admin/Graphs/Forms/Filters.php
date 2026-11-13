<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Graphs\Forms;

use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\AbstractForm;
use ModulesGarden\ggsmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class Filters extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $builder = BuilderCreator::simple($this);
        $builder->createField(Dropdown::class, 'coscoscos')->setMultiple(true)->setOptions([
            'xxxx'=>'xxx',
            'yyy'=>'yyy',
            'zzz'=>'zz',
        ]);

    }
}

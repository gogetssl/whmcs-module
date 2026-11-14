<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Tabs;

use ModulesGarden\GGSModule\Components\Badge\BadgeDanger;
use ModulesGarden\GGSModule\Components\Badge\BadgeInfo;
use ModulesGarden\GGSModule\Components\Badge\BadgeSuccess;
use ModulesGarden\GGSModule\Components\Badge\BadgeWarning;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Tabs\Tabs\Tab;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

class Tabs extends \ModulesGarden\GGSModule\Components\TabsWidget\TabsWidget implements AdminAreaInterface, AjaxOnLoadInterface
{
    public function loadData(): void
    {
        $tab2 = new \ModulesGarden\GGSModule\Components\Tab\Tab();
        $tab2->setTitle('YYYYYYYY');
        $tab2->setContent('2QWWQWQWQWWWQW3');

        $customTab = new Tab();
        $customTab->setId('dupa-123');

        $this->addTab($tab2);
        $this->addTab($customTab);
    }

    public function loadHtml(): void
    {
        $tab = new \ModulesGarden\GGSModule\Components\Tab\Tab();
        $tab->addElement($this->form());
        $tab->setTitle('Form');
        $this->addTab($tab);

        $tab = new \ModulesGarden\GGSModule\Components\Tab\Tab();
        $tab->addElement($this->badges());
        $tab->setTitle('Badges');
        $this->addTab($tab);

        for ($i = 0; $i < 20; $i++)
        {
            $tab = new \ModulesGarden\GGSModule\Components\Tab\Tab();
            $tab->setTitle($i);
            $tab->setContent($i);
            $this->addTab($tab);
        }
    }

    protected function form()
    {
        return new SimpleAbstractForm();
    }

    protected function badges()
    {
        $bar = new Toolbar();

        $bar->addElement((new BadgeDanger())->setText('1'));
        $bar->addElement((new BadgeSuccess())->setText('2'));
        $bar->addElement((new BadgeWarning())->setText('3'));
        $bar->addElement((new BadgeInfo())->setText('4'));

        return $bar;
    }
}

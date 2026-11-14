<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\ServiceDetails;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonDelete;
use ModulesGarden\GGSModule\Components\IconButton\IconButtonEdit;
use ModulesGarden\GGSModule\Components\Label\LabelDanger;
use ModulesGarden\GGSModule\Components\Link\Link;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfo;
use ModulesGarden\GGSModule\Components\ListInfo\ListInfoItem;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;

class ServiceDetails extends Container
{
    public function loadHtml(): void
    {
        $listInfo = new ListInfo();
        $listInfo->addItem(new ListInfoItem('Client', 'Test Tester'));
        $listInfo->addItem((new ListInfoItem('Product', (new Link())->setTitle('#4 - VPS #4')->setUrl('https://google.com')))->setElements([
            (new IconButtonDelete())->onClick((new ModalLoad(new UserDelete()))
                ->withParams([
                    'someParams' => 666
                ])),
            (new IconButtonEdit())->onClick(new ModalLoad(new UserDelete())),
        ]));
        $listInfo->addItem(new ListInfoItem('Total Income', '$63.97 USD'));
        $listInfo->addItem(new ListInfoItem('Credentials', '#1 Amazon AWS'));
        $listInfo->addItem(new ListInfoItem('Pricing Group', '#1 EC2-AWS'));
        $listInfo->addItem(new ListInfoItem('Billing Method', 'On the first day of month'));
        $listInfo->addItem(new ListInfoItem('Billing Type', 'Custom Details'));
        $listInfo->addItem(new ListInfoItem('Label', (new LabelDanger())->displayAsStatusLabel()->setText('Danger')));

        $widget = new Widget();
        $widget->setTitle('Service Details');
        $widget->addElement($listInfo);

        $grid = new Grid();
        $grid->setRows([
            [[$widget, 6]]
        ]);
        $this->addElement($grid);
    }
}
<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\CronTasks;

use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\FormGroup\FormGroup;
use ModulesGarden\GGSModule\Components\FormLabel\FormLabel;
use ModulesGarden\GGSModule\Components\PreBlock\PreBlock;
use ModulesGarden\GGSModule\Components\Tooltip\Tooltip;
use ModulesGarden\GGSModule\Components\Widget\Widget;

class CronTasks extends Container
{
    public function loadHtml(): void
    {
        $alert = new AlertInfo();
        $alert->setText('Cron has not been started yet');

        $label = new FormLabel();
        $label->setText('Billing Data Collexting Cron');

        $tooltip = new Tooltip();
        $tooltip->setTitle('some tooltip');

        $formGroup = new FormGroup();
        $formGroup->addElement($label);
        $formGroup->addElement($tooltip);

        $collectionCron = new PreBlock();
        $collectionCron->setContent(" 0 22 * * * php -q cron.php billing");

        $label2 = new FormLabel();
        $label2->setText('Invoicing Cron');

        $tooltip2 = new Tooltip();
        $tooltip2->setTitle('some tooltip');

        $formGroup2 = new FormGroup();
        $formGroup2->addElement($label2);
        $formGroup2->addElement($tooltip2);

        $collectionCron2 = new PreBlock();
        $collectionCron2->setContent(" 0 22 * * * php -q cron.php invoice");

        $widget = new Widget();
        $widget->setTitle('Cron Tasks');
        $widget->addElement($alert);
        $widget->addElement($formGroup);
        $widget->addElement($collectionCron);
        $widget->addElement($formGroup2);
        $widget->addElement($collectionCron2);

        $this->addElement($widget);
    }
}
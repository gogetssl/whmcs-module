<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\GGSModule\Components\BoldTextWrapper\BoldTextWrapper;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\CopyPasswordInline\CopyPasswordInline;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\Image\Image;
use ModulesGarden\GGSModule\Components\ImageText\ImageText;
use ModulesGarden\GGSModule\Components\Label\Label;
use ModulesGarden\GGSModule\Components\Label\LabelPrimary;
use ModulesGarden\GGSModule\Components\TableSimple\Column\Column;
use ModulesGarden\GGSModule\Components\TableSimple\Record\Record;
use ModulesGarden\GGSModule\Components\TableSimple\TableSimple;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Components\Text\TextBold;
use ModulesGarden\GGSModule\Components\VisibilityWrapper\VisibilityWrapper;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class ServiceInformation extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $table = new TableSimple();

        $table->addColumn(new Column('resource'));
        $table->addColumn(new Column('comparisonType'));
        $table->addColumn(new Column('threshold'));
        $table->addColumn(new Column('actions'));

        $table->addRecord(new Record([
            (new ImageText((new Image())->setUrl("https://picsum.photos/200/300")))->setText("Some Label"),
            "coś",
        ]));
        $table->addRecord(new Record([
            (new ImageText((new Image())->setUrl("/modules/addons/GGSModule/resources/assets//img/logo.png")))->setText("Modules Garden"),
            'myestdomain.com',
            (new VisibilityWrapper(new FormInputText()))->disableWhen('resource', "XXX")
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Memory'),
            '2GB',

        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            'Enabled',
        ]));

        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            (new CopyPasswordInline())->setText('MagicPassword'),
        ]));

        $widget = new Widget();
        $widget->addElement($table);
        $widget->setTitle('Service Information');

        $this->addElement($widget);
    }
}
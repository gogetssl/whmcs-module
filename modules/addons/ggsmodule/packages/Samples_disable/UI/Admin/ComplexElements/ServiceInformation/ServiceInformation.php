<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\ggsmodule\Components\BoldTextWrapper\BoldTextWrapper;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Components\CopyPasswordInline\CopyPasswordInline;
use ModulesGarden\ggsmodule\Components\FormInputText\FormInputText;
use ModulesGarden\ggsmodule\Components\Image\Image;
use ModulesGarden\ggsmodule\Components\ImageText\ImageText;
use ModulesGarden\ggsmodule\Components\Label\Label;
use ModulesGarden\ggsmodule\Components\Label\LabelPrimary;
use ModulesGarden\ggsmodule\Components\TableSimple\Column\Column;
use ModulesGarden\ggsmodule\Components\TableSimple\Record\Record;
use ModulesGarden\ggsmodule\Components\TableSimple\TableSimple;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Text\TextBold;
use ModulesGarden\ggsmodule\Components\VisibilityWrapper\VisibilityWrapper;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

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
            (new ImageText((new Image())->setUrl("/modules/addons/ggsmodule/resources/assets//img/logo.png")))->setText("Modules Garden"),
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
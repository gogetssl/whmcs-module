<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Import\Index;

use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Widgets\ImportWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Widgets\ImportWidgetCsv;
use ModulesGarden\ggsmodule\App\UI\Admin\Import\Index\Widgets\TemplateDownloadWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\ArrayDataProvider\DataTable as DatewiseSalesDataTable;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Widgets\FilterWidget as DatewiseSalesFilterWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Widgets\Header as DatewiseSalesHeader;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\ArrayDataProvider\DataTable as ProfitLossDataTable;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Widgets\FilterWidget as ProfitLossFilterWidget;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Widgets\Header as ProfitLossHeader;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\ArrayDataProvider\DataTable as RenewalDataTable;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Widgets\FilterWidget as RenewFilterWidget;
use ModulesGarden\ggsmodule\Components\Alert\Alert;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\App\Libs\Icons;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Tab\Tab;
use ModulesGarden\ggsmodule\Components\TabsWidget\TabsWidget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;

class ImportContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setCss('ggs-import');
        if(!\ModulesGarden\ggsmodule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('ggs-html');
            $text->setText($this->explanation());
            $this->addElement($text);
        }

        $tab1 = new Tab();
        $tab1->setTitle($this->translate("single"));
        $tab1->addElement(new ImportWidget());

        $tab2 = new Tab();
        $tab2->setTitle($this->translate("csv"));
        $tab2->addElement(new ImportWidgetCsv());
        $tab2->addElement(new TemplateDownloadWidget());

        $tabs = new TabsWidget();
        $tabs->addTab($tab1);
        $tabs->addTab($tab2);


        $this->addElement($tabs);

    }

    /** What the page is for and how to use the two tabs */
    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key, [], ['admin.import']), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li>' . $t($key) . '</li>'; };

        return '<div class="ggs-explain"><span class="ggs-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $t('about_intro') . '</p>'
            . '<ul>' . $item('about_single') . $item('about_csv') . $item('about_service') . '</ul>'
            . '</div></div>';
    }
}

<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\ArrayDataProvider;


use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms\DownloadForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms\GetCsvForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\ggsmodule\Components\Button\Button;
use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\DataTable\Column;
use ModulesGarden\ggsmodule\Components\Dropdown\Dropdown;
use ModulesGarden\ggsmodule\Components\Form\Form;
use ModulesGarden\ggsmodule\Components\FormLabel\FormLabel;
use ModulesGarden\ggsmodule\Components\Label\Label;
use ModulesGarden\ggsmodule\Components\Label\LabelDanger;
use ModulesGarden\ggsmodule\Components\Label\LabelInfo;
use ModulesGarden\ggsmodule\Components\Label\LabelSuccess;
use ModulesGarden\ggsmodule\Components\Label\LabelWarning;
use ModulesGarden\ggsmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\ggsmodule\Core\Components\Actions\Reload;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\ArrayDataProvider;

use ModulesGarden\ggsmodule\Core\Support\Facades\Request;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Service;
use WHMCS\User\Client;

class DataTable extends \ModulesGarden\ggsmodule\Components\DataTable\DataTable implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setId('renewalDataTable');

        $this->addColumn((new Column('date'))
                             ->setTitle($this->translate('date'))
                             ->setSortable()
                             ->setSearchable(true))
             ->addColumn((new Column('storeId'))
                             ->setTitle($this->translate('storeId'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('clientDetails'))
                             ->setTitle($this->translate('clientDetails'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('productDetails'))
                             ->setTitle($this->translate('productDetails'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('type'))
                             ->setTitle($this->translate('type'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('brand'))
                             ->setTitle($this->translate('brand'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('status'))
                             ->setTitle($this->translate('status'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('issueDate'))
                             ->setTitle($this->translate('issueDate'))
                             ->setSortable(true)
                             ->setSearchable(true))
             ->addColumn((new Column('expirationDate'))
                             ->setTitle($this->translate('expirationDate'))
                             ->setSortable(true)
                             ->setSearchable(true));

        $this->setRecordsPerPageOptions([10, 25]);
        $this->addToToolbar(new DownloadForm());
    }

    public function loadData(): void
    {
        $filters         = Request::get('ajaxData');//custom filter values
        $recordsProvider = new RecordsProvider();
        $rows            = $recordsProvider->getRecords($filters);

        $dataProv = new ArrayDataProvider($rows);
        $dataProv->setDefaultSorting('date', 'DESC');
        $this->setDataProvider($dataProv);
    }

    protected function parseDataSetRecords(): void
    {
        $this->dataSet->setFieldModifier('status', function($fieldName, $row, $fieldValue) {

            if($fieldValue == 'Active')
            {
                $label = new LabelSuccess();
            }
            elseif($fieldValue == 'Pending')
            {
                $label = new LabelWarning();
            }
            elseif($fieldValue == 'Awaiting Configuration')
            {
                $label = new Label();
            }
            else
            {
                $label = new LabelDanger();
            }

            $label->setText($fieldValue);

            return $label;
        });

        $this->dataSet->modifyRecords();
    }
}

<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\DataTable\Column;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalOpen;
use ModulesGarden\GGSModule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Contracts\ResponseInterface;
use ModulesGarden\GGSModule\Core\DataProviders\ArrayDataProvider;
use ModulesGarden\GGSModule\Core\Support\Arr;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;

class DataTable extends \ModulesGarden\GGSModule\Components\DataTable\DataTable implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $cid = 'my-table';

    public function loadHtml(): void
    {
        $this->addColumn((new Column('id')));

        $this->addToBurgerToolbar((new ButtonPrimary())->onClick(new ModalOpen(new Modal())));
    }

    public function loadData(): void
    {
        $data  = Arr::get(Request::get('ajaxData'), 'records', []);
        $toAdd = Arr::get(Request::get('ajaxData'), 'recordToAdd', null);

        if ($toAdd)
        {
            $data[] = [
                'id' => $toAdd
            ];
        }

        $this->setDataProvider((new ArrayDataProvider($data)));
        $this->setAjaxData(['records' => $data, 'recordToAdd' => null]);
    }
}
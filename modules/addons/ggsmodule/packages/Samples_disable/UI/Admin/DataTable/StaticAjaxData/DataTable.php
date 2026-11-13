<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\ggsmodule\Components\Button\ButtonPrimary;
use ModulesGarden\ggsmodule\Components\DataTable\Column;
use ModulesGarden\ggsmodule\Core\Components\Actions\ModalOpen;
use ModulesGarden\ggsmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\ggsmodule\Core\Components\Actions\Reload;
use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Contracts\ResponseInterface;
use ModulesGarden\ggsmodule\Core\DataProviders\ArrayDataProvider;
use ModulesGarden\ggsmodule\Core\Support\Arr;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;

class DataTable extends \ModulesGarden\ggsmodule\Components\DataTable\DataTable implements AjaxComponentInterface, AdminAreaInterface
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
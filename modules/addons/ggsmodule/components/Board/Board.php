<?php

namespace ModulesGarden\GGSModule\Components\Board;

use ModulesGarden\GGSModule\Components\BoardColumn\BoardColumn;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Core\Components\DataBuilder;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxDataProviderTrait;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Components\Response\Response;

class Board extends Container
{
    public const COMPONENT = 'Board';

    use AjaxDataProviderTrait;

    public function __construct()
    {
        parent::__construct();

        $this->providerAction = CrudProvider::ACTION_READ;
    }

    protected function processReadAction(string $providerAction)
    {
        return new Response(
            (new DataBuilder($this))
                ->withHtml()
                ->withData()
                ->toArray()
        );
    }

    public function addColumn(BoardColumn $column): self
    {
        $this->addComponent('columns', $column);

        return $this;
    }
}

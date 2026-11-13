<?php

namespace ModulesGarden\ggsmodule\Components\Board;

use ModulesGarden\ggsmodule\Components\BoardColumn\BoardColumn;
use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Core\Components\DataBuilder;
use ModulesGarden\ggsmodule\Core\Components\Traits\AjaxDataProviderTrait;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;

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

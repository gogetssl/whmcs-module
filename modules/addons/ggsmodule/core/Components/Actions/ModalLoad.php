<?php

namespace ModulesGarden\ggsmodule\Core\Components\Actions;

use ModulesGarden\ggsmodule\Components\Modal\Modal;
use ModulesGarden\ggsmodule\Core\Components\AbstractActionInterface;
use ModulesGarden\ggsmodule\Core\Components\Actions\Traits\WithParamsTrait;
use ModulesGarden\ggsmodule\Core\Components\DataBuilder;

class ModalLoad extends AbstractActionInterface
{
    use WithParamsTrait;

    protected Modal $modal;

    public function __construct(Modal $modal)
    {
        $this->modal = $modal;
    }

    public function toArray(): array
    {
        return [
            'action'       => 'modalLoad',
            'modal'        => (new DataBuilder($this->modal))->toArray(),
            'params'       => $this->ajaxData,
        ];
    }
}

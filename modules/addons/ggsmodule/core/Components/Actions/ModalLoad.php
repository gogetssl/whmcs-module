<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Components\Modal\Modal;
use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;
use ModulesGarden\GGSModule\Core\Components\Actions\Traits\WithParamsTrait;
use ModulesGarden\GGSModule\Core\Components\DataBuilder;

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

<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;
use ModulesGarden\GGSModule\Core\Components\Actions\Traits\WithParamsTrait;

/**
 * PassAjaxData
 */
class PassAjaxData extends AbstractActionInterface
{
    protected string $componentId;

    protected array $data;

    public function __construct(string $componentId, array $data = [])
    {
        $this->componentId = $componentId;
        $this->data        = $data;
    }

    public function toArray(): array
    {
        return [
            'action'    => 'passAjaxData',
            'elementId' => $this->componentId,
            'data'      => $this->data
        ];
    }
}

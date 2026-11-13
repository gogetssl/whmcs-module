<?php

namespace ModulesGarden\ggsmodule\Core\Components\Actions;

use ModulesGarden\ggsmodule\Core\Components\AbstractActionInterface;
use ModulesGarden\ggsmodule\Core\Components\DataBuilder;

class ModalFormSubmit extends AbstractActionInterface
{
    protected $modal;

    public function __construct($modal)
    {
        $this->modal = $modal;
    }

    public function toArray(): array
    {
        return [
            'action'    => 'modalFormSubmit',
            'elementId' => $this->modal ? $this->modal->getId() : null,
        ];
    }
}

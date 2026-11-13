<?php

namespace ModulesGarden\ggsmodule\Core\Components\Actions;

use ModulesGarden\ggsmodule\Core\Components\AbstractActionInterface;
use ModulesGarden\ggsmodule\Core\Components\DataBuilder;

class ModalClose extends AbstractActionInterface
{
    protected $modal;

    public function __construct($modal = null)
    {
        $this->modal = $modal;
    }

    public function toArray(): array
    {
        return [
            'action'    => 'modalClose',
            'elementId' => $this->modal ? $this->modal->getId() : null,
        ];
    }
}

<?php

namespace ModulesGarden\GGSModule\Core\Components\Actions;

use ModulesGarden\GGSModule\Core\Components\AbstractActionInterface;
use ModulesGarden\GGSModule\Core\Components\DataBuilder;

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

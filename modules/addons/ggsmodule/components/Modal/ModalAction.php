<?php

namespace ModulesGarden\GGSModule\Components\Modal;

use ModulesGarden\GGSModule\Components\Button\ButtonCancel;
use ModulesGarden\GGSModule\Components\Button\ButtonDanger;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalFormSubmit;

class ModalAction extends ModalBase
{
    protected $actionModal = true;
}

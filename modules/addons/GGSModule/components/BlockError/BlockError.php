<?php

namespace ModulesGarden\GGSModule\Components\BlockError;

use ModulesGarden\GGSModule\Components\Alert\AlertDanger;
use ModulesGarden\GGSModule\Components\Div\Div;
use ModulesGarden\GGSModule\Components\PreBlock\PreBlock;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\GGSModule\Core\Exceptions\UserException;
use ModulesGarden\GGSModule\Core\Support\Facades\Config;

class BlockError extends Div implements ClientAreaInterface, AdminAreaInterface
{
    protected \Throwable $exception;

    public function setException(\Throwable $exception)
    {
        $this->exception = $exception;
    }

    public function loadHtml(): void
    {
        $alert = new AlertDanger();
        $alert->setText($this->exception->getMessage());
        $this->addElement($alert);

        if (Config::get('configuration.debug', false) && !($this->exception instanceof UserException))
        {
            $pre = new PreBlock();
            $pre->setContent($this->exception->getTraceAsString());

            $this->addElement($pre);
        }
    }
}

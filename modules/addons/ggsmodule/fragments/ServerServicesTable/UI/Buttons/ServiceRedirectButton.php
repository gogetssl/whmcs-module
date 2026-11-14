<?php

namespace ModulesGarden\GGSModule\Fragments\ServerServicesTable\UI\Buttons;

use ModulesGarden\GGSModule\Components\IconButton\IconButton;
use ModulesGarden\GGSModule\Core\Components\Actions\Redirect;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Routing\Url;

class ServiceRedirectButton extends IconButton implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate("service_details"));
        $this->setIcon("information");

        $this->onClick((new Redirect(Url::adminarea('clientsservices.php'), [
            'userid' => 'client_id',
            'productselect' => 'service_id'
        ])));
    }
}
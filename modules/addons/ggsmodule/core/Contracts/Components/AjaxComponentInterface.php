<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Components;

interface AjaxComponentInterface
{
    public function loadData(): void;

    public function returnAjaxData();
}

<?php

namespace ModulesGarden\GGSModule\Core\Http\View\MenuProviders;

interface MenuProviderInterface
{
    public function getMenuItems(): array;
}

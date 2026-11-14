<?php

namespace ModulesGarden\GGSModule\Components\FileManager\Source;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Contracts\Components\ActionInterface;

class File extends Item
{
    protected static bool $isDir = false;
    protected static string $icon = "file-document";

    public function getClickAction(AbstractComponent $component): ?ActionInterface
    {
        return null;
    }
}
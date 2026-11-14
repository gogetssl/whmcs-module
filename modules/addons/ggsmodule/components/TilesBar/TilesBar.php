<?php

namespace ModulesGarden\GGSModule\Components\TilesBar;

use ModulesGarden\GGSModule\Components\TileButton\TileButton;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentContainerInterface;

class TilesBar extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'TilesBar';

    public function addTile(TileButton $tile): self
    {
        $this->addElement($tile);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->setSlot('title', $title);

        return $this;
    }

    public function setTitleTextCentered(bool $titleTextCentered = true): self
    {
        $this->setSlot('titleTextCentered', $titleTextCentered);

        return $this;
    }
}

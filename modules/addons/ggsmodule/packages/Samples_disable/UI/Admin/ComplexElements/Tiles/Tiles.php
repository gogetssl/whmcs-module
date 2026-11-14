<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComplexElements\Tiles;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\TileButton\TileButton;
use ModulesGarden\GGSModule\Components\TilesBar\TilesBar;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Core\ModuleConstants;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;

class Tiles extends Container
{
    public function loadHtml(): void
    {
        $tiles = new TilesBar();
        $tiles->setTitle('Actions');
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'backup-jobs.png'))->setTitle('Backups Jobs')->onClick(new ModalLoad(new UserDelete())));
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'backups.png'))->setTitle('Backups'));
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'console.png'))->setTitle('Console'));
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'disks.png'))->setTitle('Disk'));
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'dns.png'))->setTitle('DNS'));
        $tiles->addTile((new TileButton())->setImagePath(ModuleConstants::getFullPath('resources', 'assets', 'img', 'actions', 'firewall.png'))->setTitle('Firewall'));

        $this->addElement($tiles);
    }
}
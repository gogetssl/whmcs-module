<?php

namespace ModulesGarden\GGSModule\Core\Components;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalFormSubmit;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalLoad;
use ModulesGarden\GGSModule\Core\Components\Actions\ModalOpen;
use ModulesGarden\GGSModule\Core\Components\Actions\Redirect;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadById;
use ModulesGarden\GGSModule\Core\Components\Actions\ReloadParent;
use ModulesGarden\GGSModule\Core\Contracts\Components\ComponentInterface;

/**
 * @todo to na razie jest tylko wersja robocza, przerobić później na pod obiekty (factory)
 */
class Action
{
    public static function modalLoad($modal): ModalLoad
    {
        return new ModalLoad($modal);
    }

    public static function modalOpen($modal): ModalOpen
    {
        return new ModalOpen($modal);
    }

    public static function redirect(string $url): Redirect
    {
        return new Redirect($url);
    }

    public static function reload(ComponentInterface $element): Reload
    {
        return new Reload($element);
    }

    public static function reloadById($componentId): ReloadById
    {
        return new ReloadById($componentId);
    }

    public static function reloadParent(): ReloadParent
    {
        return new ReloadParent();
    }
}

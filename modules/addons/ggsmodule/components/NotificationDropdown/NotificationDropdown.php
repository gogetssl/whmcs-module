<?php

namespace ModulesGarden\ggsmodule\Components\NotificationDropdown;

use ModulesGarden\ggsmodule\Components\NotificationDropdownItem\NotificationDropdownItem;
use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\TranslatorTrait;
use ModulesGarden\ggsmodule\Core\Contracts\ResponseInterface;
use ModulesGarden\ggsmodule\Core\Support\Facades\Request;

class NotificationDropdown extends AbstractComponent
{
    use AjaxTrait;
    use ComponentsContainerTrait;
    use TranslatorTrait;

    protected int $unreadCounter = 0;

    protected array $callbacks = [
        'clickItemCallback',
        'deleteItemCallback'
    ];

    public const COMPONENT = 'NotificationDropdown';

    public function __construct()
    {
        parent::__construct();
        $this->setTranslations(['notifications']);
        $this->disableAutoReload();
    }

    public function enableAutoReload(): self
    {
        $this->ajaxAutoReload = true;

        return $this;
    }

    public function disableAutoReload(): self
    {
        $this->ajaxAutoReload = false;

        return $this;
    }

    public function setReloadInterval(int $milliseconds): self
    {
        $this->ajaxAutoReloadInterval = $milliseconds;

        return $this;
    }

    public function loadHtml(): void
    {
        $this->loadItems();
        $this->setUnreadCounterSlot();
    }

    public function addItem(NotificationDropdownItem $item): self
    {
        $this->unreadCounter = !$item->getSlot('read') ? ++$this->unreadCounter : $this->unreadCounter;
        $item->onClick(Action::reloadParent());
        $this->addComponent('items', $item);

        return $this;
    }

    public function returnAjaxData(): ResponseInterface
    {
        return parent::returnAjaxData()->setActions($this->fireCallback());
    }

    protected function fireCallback(): array
    {
        $actions = [];
        $itemId = Request::get('itemId');
        $callback = Request::get('action'). "Callback";

        if ($itemId && in_array($callback, $this->callbacks)) {
            $actions[] = $this->$callback($itemId);
        }

        return $actions;
    }

    protected function setUnreadCounterSlot(): void
    {
        $this->setSlot('unreadCount', $this->unreadCounter);
    }

    protected function loadItems()
    {
    }

    protected function clickItemCallback($itemId)
    {
    }

    protected function deleteItemCallback($itemId)
    {
    }
}
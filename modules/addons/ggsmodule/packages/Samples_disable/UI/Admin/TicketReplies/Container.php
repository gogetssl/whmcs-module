<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TicketReplies;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TicketReplies\Widgets\TicketRepliesWidget;

class Container extends \ModulesGarden\ggsmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new TicketRepliesWidget());
    }
}
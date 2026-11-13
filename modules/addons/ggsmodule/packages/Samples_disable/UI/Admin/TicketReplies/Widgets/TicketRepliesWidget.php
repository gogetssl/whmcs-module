<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TicketReplies\Widgets;

use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Components\Actions\Reload;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Ticket;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete;
use ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserEdit;
use ModulesGarden\ggsmodule\Components\TicketReplyPreview\TicketReplyPreview;

class TicketRepliesWidget extends Widget implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $ticket = Ticket::find(2);

        foreach ($ticket->replies as $ticketReply)
        {
            $ticketReplyPreview = new TicketReplyPreview($ticketReply);
            $ticketReplyPreview->onChange(new Reload($this));
            $ticketReplyPreview->addEditButton(new UserEdit());
            $ticketReplyPreview->addEditButton(new UserDelete());
            $this->addElement($ticketReplyPreview);
        }
    }
}
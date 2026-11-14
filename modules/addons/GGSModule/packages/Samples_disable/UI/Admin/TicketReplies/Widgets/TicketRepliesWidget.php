<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TicketReplies\Widgets;

use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\Reload;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\WHMCS\Models\Ticket;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\DataTable\Buttons\UserEdit;
use ModulesGarden\GGSModule\Components\TicketReplyPreview\TicketReplyPreview;

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
<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\TicketReplies\Components;

use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Components\TicketReplyPreview\TicketReplyPreview as TicketReplyPreviewComponent;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class TicketReplyPreview extends TicketReplyPreviewComponent implements AdminAreaInterface, AjaxComponentInterface
{

}
<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\TicketReplies\Components;

use ModulesGarden\ggsmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\ggsmodule\Components\TicketReplyPreview\TicketReplyPreview as TicketReplyPreviewComponent;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class TicketReplyPreview extends TicketReplyPreviewComponent implements AdminAreaInterface, AjaxComponentInterface
{

}
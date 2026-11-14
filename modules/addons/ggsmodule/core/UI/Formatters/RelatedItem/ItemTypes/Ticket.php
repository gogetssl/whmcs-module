<?php

namespace ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\GGSModule\Core\Components\Traits\TranslatorTrait;
use ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\RelatedItem;
use ModulesGarden\GGSModule\Core\WHMCS\URL;

class Ticket extends ItemTypeWithModel
{
    use TranslatorTrait;

    protected static string $modelClass = \ModulesGarden\GGSModule\Core\WHMCS\Models\Order::class;

    public function generateUrl(): string
    {
        return URL\Admin::tickets($this->id);
    }

    public function generateName(): string
    {
        return html_entity_decode('#' . $this->id . " " . $this->translate(RelatedItem::TYPE_TICKET));
    }
}
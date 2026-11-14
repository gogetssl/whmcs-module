<?php

namespace ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\GGSModule\Core\WHMCS\URL;

class Product extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\GGSModule\Core\WHMCS\Models\Product::class;

    public function generateUrl(): string
    {
        return URL\Admin::productConfig($this->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode($model->name);
    }
}
<?php

namespace ModulesGarden\ggsmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\ggsmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\ggsmodule\Core\WHMCS\URL;

class Product extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\ggsmodule\Core\WHMCS\Models\Product::class;

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
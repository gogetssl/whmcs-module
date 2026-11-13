<?php

namespace ModulesGarden\ggsmodule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\ggsmodule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\ggsmodule\Core\WHMCS\URL;

class Client extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\ggsmodule\Core\WHMCS\Models\Client::class;

    public function generateUrl(): string
    {
        $model = $this->getModel();

        return URL\Admin::clientSummary($model->id);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->id . ' ' . $model->firstname . ' ' . $model->lastname . ($model->companyname ? (" (" . $model->companyname . ")") : ''));
    }
}
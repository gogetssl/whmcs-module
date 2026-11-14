<?php

namespace ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypes;

use ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem\ItemTypeWithModel;
use ModulesGarden\GGSModule\Core\WHMCS\URL;

class Service extends ItemTypeWithModel
{
    protected static string $modelClass = \ModulesGarden\GGSModule\Core\WHMCS\Models\Service::class;

    public function generateUrl(): string
    {
        $model = $this->getModel();

        $parameters['productselect'] = $model->id;

        return URL\Admin::clientServices($model->userid, $parameters);
    }

    public function generateName(): string
    {
        $model = $this->getModel();

        return html_entity_decode('#' . $model->id . ' ' . $model->product->name . (!empty($model->domain) ? " ({$model->domain})" : ""));
    }
}
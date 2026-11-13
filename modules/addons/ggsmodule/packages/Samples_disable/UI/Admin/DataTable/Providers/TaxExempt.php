<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\DataTable\Providers;

use ModulesGarden\ggsmodule\Core\Components\Actions\ReloadParent;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Core\Support\Facades\Translator;
use WHMCS\User\Client;

class TaxExempt extends CrudProvider
{
    public function update()
    {
        Client::where('id', $this->formData['id'])->update([
            'taxexempt' => $this->formData['value'] === 'true',
        ]);

        return (new Response())->setSuccess(Translator::get('XXXX', []))->setActions([new ReloadParent()]);
    }
}

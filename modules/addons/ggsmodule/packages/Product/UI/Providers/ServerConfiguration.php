<?php

namespace ModulesGarden\GGSModule\Packages\Product\UI\Providers;

use ModulesGarden\GGSModule\Core\Components\Actions\ModalClose;
use ModulesGarden\GGSModule\Core\Components\Actions\Redirect;
use ModulesGarden\GGSModule\Core\Components\Response\Response;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;
use ModulesGarden\GGSModule\Core\Translation\TranslatorTrait;

class ServerConfiguration extends CrudProvider
{
    use TranslatorTrait;

    public function read()
    {
        $data = (new \ModulesGarden\GGSModule\Packages\Product\Services\ServerConfiguration(Request::get('id', 0)))
            ->get();

        foreach ($data as $setting => $value)
        {
            $this->data[sprintf('serverconfig[%s]', $setting)] = $value;

            if (is_array($value))
            {
                foreach ($value as $key => $subValue)
                {
                    $this->data[sprintf("serverconfig[%s][{$key}]", $setting)] = $subValue;
                }
            }
        }
    }

    public function create()
    {
        (new \ModulesGarden\GGSModule\Packages\Product\Services\ServerConfiguration(Request::get('id', 0)))
            ->save($this->formData['serverconfig']);

        return (new Response())
            ->setSuccess($this->translate("create_success"))
            ->setActions([
                new ModalClose(),
                new Redirect(html_entity_decode(Request::getRequestUri()))
            ]);
    }
}

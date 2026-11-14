<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers\Instances\Http;

use ModulesGarden\GGSModule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Http\Response;
use ModulesGarden\GGSModule\Core\Support\Facades\Params;

class Integration extends HttpController implements AdminAreaInterface
{
    protected $templateName = 'integration';

    public function execute($params = null)
    {
        Params::createFrom((array)$params);

        if (!$this->controllerResult)
        {
            return '';
        }

        return $this->resolveResponse();
    }

    public function resolveResponse()
    {
        if ($this->controllerResult instanceof Response)
        {
            $this->controllerResult->setForceHtml();
        }

        return $this->responseResolver->setResponse($this->controllerResult)
            ->setTemplateName($this->getTemplateName())
            ->setTemplateDir($this->getTemplateDir())
            ->setPageController($this)
            ->resolve();
    }
}

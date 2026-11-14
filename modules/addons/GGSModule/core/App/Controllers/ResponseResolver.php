<?php

namespace ModulesGarden\GGSModule\Core\App\Controllers;

use ModulesGarden\GGSModule\Core\App\Controllers\ResponseResolver\Resolver;
use ModulesGarden\GGSModule\Core\Http\JsonResponse;
use ModulesGarden\GGSModule\Core\Http\RedirectResponse;
use ModulesGarden\GGSModule\Core\Traits\OutputBuffer;
use ModulesGarden\GGSModule\Core\Traits\Template;
use ModulesGarden\GGSModule\Core\UI\View;
use ModulesGarden\GGSModule\Core\UI\ViewAjax;
use ModulesGarden\GGSModule\Core\UI\Views\AbstractView;

class ResponseResolver
{
    use OutputBuffer;
    use Template;

    /**
     * @var null|HttpController
     */
    protected $pageController = null;
    protected $response = null;

    public function __construct($response = null)
    {
        $this->setResponse($response);
    }

    /**
     * @param null $response
     * @return $this
     */
    public function setResponse($response = null)
    {
        if ($response)
        {
            $this->response = $response;
        }

        return $this;
    }

    /**
     * @return HttpController|null
     */
    public function getPageController()
    {
        return $this->pageController;
    }

    /**
     * @param null|HttpController $pageController
     */
    public function setPageController($pageController)
    {
        $this->pageController = $pageController;

        return $this;
    }

    /**
     * resolves the response
     */
    public function resolve()
    {
        $resolver = new Resolver($this->response);
        $response = $resolver->resolve();
        if ($response)
        {
            return $response;
        }

        if ($this->response instanceof View || $this->response instanceof ViewAjax || $this->response instanceof AbstractView)
        {
            $this->response = $this->response->getResponse();
        }

        if ($this->response instanceof \Symfony\Component\HttpFoundation\JsonResponse)
        {
            $this->resolveJson();
        }
        elseif ($this->response instanceof \Symfony\Component\HttpFoundation\RedirectResponse)
        {
            $this->resolveRedirect();
        }
        elseif ($this->response instanceof \Symfony\Component\HttpFoundation\Response)
        {
            $this->cleanOutputBuffer();
            $this->response->send();
            exit;
        }
        elseif ($this->response)
        {
            return $this->response;
        }
    }


    /**
     * resolve \ModulesGarden\GGSModule\Core\Http\JsonResponse
     */
    public function resolveJson()
    {
        $this->cleanOutputBuffer();
        /**
         * @var JsonResponse
         */
        $this->response->send();
        exit;
    }

    public function resolveRedirect()
    {
        $this->cleanOutputBuffer();

        /**
         * @var RedirectResponse
         */
        $this->response->send();
        exit;
    }
}

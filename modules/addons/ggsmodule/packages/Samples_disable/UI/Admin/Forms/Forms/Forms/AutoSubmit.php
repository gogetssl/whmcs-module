<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\GGSModule\Components\Form\AbstractForm;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxAutoSubmitInterface;

class AutoSubmit extends AbstractForm /*implements AjaxAutoSubmitInterface*/
{
    public function loadHtml(): void
    {
        $this->setAction('https://google.com');
        $this->setMethod('post');
        $this->setTarget('_blank');
    }
}

<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Forms\MarkdownEditor;

use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;

class MarkdownEditor extends \ModulesGarden\GGSModule\Components\Form\Form implements AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Markdown Editor');
        $this->addElement($widget);

        $this->builder->setDefaultContainer($widget);

        $markdown = new \ModulesGarden\GGSModule\Components\MarkdownEditor\MarkdownEditor();
        $markdown->setName('markdown');
        $this->builder->addElement($markdown);

        $this->builder->addElement(new ButtonSubmitSuccess());
    }
}
<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Forms\MarkdownEditor;

use ModulesGarden\ggsmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;

class MarkdownEditor extends \ModulesGarden\ggsmodule\Components\Form\Form implements AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Markdown Editor');
        $this->addElement($widget);

        $this->builder->setDefaultContainer($widget);

        $markdown = new \ModulesGarden\ggsmodule\Components\MarkdownEditor\MarkdownEditor();
        $markdown->setName('markdown');
        $this->builder->addElement($markdown);

        $this->builder->addElement(new ButtonSubmitSuccess());
    }
}
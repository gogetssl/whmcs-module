<?php

namespace ModulesGarden\GGSModule\Components\MarkdownEditor;

use ModulesGarden\GGSModule\Core\Components\FormFields\FormField;

/**
 * Class IconButton
 */
class MarkdownEditor extends FormField
{
    public const COMPONENT = 'MarkdownEditor';

    public function enableAutoSave(bool $autoSave = true):self
    {
        $this->setSlot('autoSaveEnabled', $autoSave);

        return $this;
    }
}

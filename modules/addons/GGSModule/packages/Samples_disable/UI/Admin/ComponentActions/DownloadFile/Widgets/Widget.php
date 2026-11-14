<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets;

use ModulesGarden\GGSModule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\GGSModule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms\Form;

class Widget extends \ModulesGarden\GGSModule\Components\Widget\Widget
{
    public function loadHtml(): void
    {
        $this->setTitle('Download file');

        $button = new ButtonSubmitSuccess();
        $button->onClick(new DownloadFileFromForm(new Form(), [
            'downloadThisFile' => 'ThisFile!'
        ]));
        $button->setTitle('Download');
        $this->addElement($button);
    }
}
<?php

namespace ModulesGarden\ggsmodule\Components\MediaLibrary\Elements;

use ModulesGarden\ggsmodule\Components\Button\Button;
use ModulesGarden\ggsmodule\Core\Components\Action;

abstract class UploadButton extends Button
{
    protected $css = 'lu-btn';

    public function __construct()
    {
        parent::__construct();
        $this->setTitle($this->translate('upload_image'));
        $this->setCss('lu-btn lu-btn--primary');
    }

    public function setModal(UploadModal $modal)
    {
        $this->onClick(Action::modalOpen($modal));
    }
}

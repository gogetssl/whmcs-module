<?php

namespace ModulesGarden\GGSModule\Components\ImageText;

use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Core\Components\Traits\TextTrait;
use ModulesGarden\GGSModule\Core\Components\Traits\UrlTrait;

class ImageText extends Container
{
    use UrlTrait;
    use TextTrait;

    public const COMPONENT = 'ImageText';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'no_image',
        ]);
    }
}
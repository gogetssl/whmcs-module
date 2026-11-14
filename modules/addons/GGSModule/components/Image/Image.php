<?php

namespace ModulesGarden\GGSModule\Components\Image;

use ModulesGarden\GGSModule\Core\Components\Traits\UrlTrait;
use ModulesGarden\GGSModule\Components\Container\Container;

class Image extends Container
{
    use UrlTrait;

    public const COMPONENT = 'Image';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'no_image',
        ]);
    }
}

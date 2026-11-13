<?php

namespace ModulesGarden\ggsmodule\Components\Image;

use ModulesGarden\ggsmodule\Core\Components\Traits\UrlTrait;
use ModulesGarden\ggsmodule\Components\Container\Container;

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

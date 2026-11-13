<?php

namespace ModulesGarden\ggsmodule\Components\ImageText;

use ModulesGarden\ggsmodule\Components\Container\Container;
use ModulesGarden\ggsmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\ggsmodule\Core\Components\Traits\UrlTrait;

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
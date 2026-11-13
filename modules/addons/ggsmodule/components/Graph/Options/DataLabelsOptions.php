<?php

namespace ModulesGarden\ggsmodule\Components\Graph\Options;

use ModulesGarden\ggsmodule\Components\Graph\Source\AbstractOption;

class DataLabelsOptions extends AbstractOption
{
    public bool $enabled;

    public function __construct(bool $enabled = false)
    {
        $this->enabled = $enabled;
    }

    public function getAttributes():array
    {
        return [
            'enabled' => $this->enabled,
        ];
    }
}
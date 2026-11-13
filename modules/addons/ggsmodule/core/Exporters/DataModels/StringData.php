<?php

namespace ModulesGarden\ggsmodule\Core\Exporters\DataModels;

use ModulesGarden\ggsmodule\Core\Exporters\Source\BaseDataModel;
use Stringable;

class StringData extends BaseDataModel implements Stringable
{
    protected string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString(): string
    {
        return $this->content;
    }
}
<?php

namespace ModulesGarden\ggsmodule\Core\UI\Formatters;

use ModulesGarden\ggsmodule\Core\Components\Traits\TranslatorTrait;

class JobNameTranslator
{
    use TranslatorTrait;

    public function format($job): string
    {
        $jobNameElements = explode('@', $job);
        return $this->translate($jobNameElements[0], [], ['jobs']);
    }

}
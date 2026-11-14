<?php

namespace ModulesGarden\GGSModule\Core\UI\Formatters;

use ModulesGarden\GGSModule\Core\Components\Traits\TranslatorTrait;

class JobNameTranslator
{
    use TranslatorTrait;

    public function format($job): string
    {
        $jobNameElements = explode('@', $job);
        return $this->translate($jobNameElements[0], [], ['jobs']);
    }

}
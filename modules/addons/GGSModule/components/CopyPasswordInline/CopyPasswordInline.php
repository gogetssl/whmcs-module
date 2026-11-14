<?php

namespace ModulesGarden\GGSModule\Components\CopyPasswordInline;

use ModulesGarden\GGSModule\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\GGSModule\Core\Components\Traits\ActionOnClickTrait;

class CopyPasswordInline extends CopyTextInline
{
    use ActionOnClickTrait;

    public const COMPONENT = 'CopyPasswordInline';

    public function setVisible()
    {
        $this->setSlot('is_visible', true);

        return $this;
    }
}

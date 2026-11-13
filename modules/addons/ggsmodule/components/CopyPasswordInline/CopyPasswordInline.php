<?php

namespace ModulesGarden\ggsmodule\Components\CopyPasswordInline;

use ModulesGarden\ggsmodule\Components\CopyTextInline\CopyTextInline;
use ModulesGarden\ggsmodule\Core\Components\Traits\ActionOnClickTrait;

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

<?php

namespace ModulesGarden\GGSModule\Components\PreBlock;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\AjaxTrait;

/**
 * Class PreBlock
 */
class PreBlock extends AbstractComponent
{
    use AjaxTrait;

    public const COMPONENT = 'PreBlock';

    /**
     * @param string $content
     * @return PreBlock
     */
    public function setContent($content)
    {
        $this->setSlot('content', $content);

        return $this;
    }
}

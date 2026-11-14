<?php

namespace ModulesGarden\GGSModule\Core\Traits;

use ModulesGarden\GGSModule\Core\ServiceLocator;

/**
 * @deprecated
 */
trait Lang
{
    /**
     * @var null|\ModulesGarden\GGSModule\Core\Lang\Lang
     */
    protected $lang = null;

    /**
     * @return void
     * @deprecated
     */
    public function loadLang()
    {
        if ($this->lang === null)
        {
            $this->lang = ServiceLocator::call('lang');
        }
    }
}

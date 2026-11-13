<?php

namespace ModulesGarden\ggsmodule\Core\Components\FallbackTraits;

use ModulesGarden\ggsmodule\Core\UI\Traits\ACL;

trait BackwardCompatibilityTrait
{
    use ACL;

    public function getTemplateName()
    {
        return 'string:test';
    }

    /**
     * @param $mainContainer
     * @return void
     * @deprecated  - do not use!
     */


    public function getHtml()
    {
        return $this;
    }
}

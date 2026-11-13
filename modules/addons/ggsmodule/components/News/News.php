<?php

namespace ModulesGarden\ggsmodule\Components\News;

use ModulesGarden\ggsmodule\Core\Components\AbstractComponent;
use ModulesGarden\ggsmodule\Core\Components\Traits\ComponentsContainerTrait;

class News extends AbstractComponent
{
    use ComponentsContainerTrait;

    public const COMPONENT = 'News';

    public function addItem(NewsItem $newsItem) :self
    {
        $this->addElement($newsItem->toArray());

        return $this;
    }
}

<?php

namespace ModulesGarden\GGSModule\Components\News;

use ModulesGarden\GGSModule\Core\Components\AbstractComponent;
use ModulesGarden\GGSModule\Core\Components\Traits\ComponentsContainerTrait;

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

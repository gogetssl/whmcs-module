<?php

namespace ModulesGarden\GGSModule\Components\ArrayTreeView;

use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ElementsExpanderTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ElementsPrefixTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ExpanderOnBeginningTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\KeyValueSeparatorTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\HiddenKeysModeTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeViewItem\ArrayTreeViewItem;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;

class ArrayTreeView extends AbstractComponent
{
    use ElementsPrefixTrait;
    use KeyValueSeparatorTrait;
    use ElementsExpanderTrait;
    use ExpanderOnBeginningTrait;
    use HiddenKeysModeTrait;

    public const COMPONENT = 'ArrayTreeView';
    public const DEFAULT_ELEMENTS_EXPANDER = '(...)';

    protected array $elements = [];

    public function __construct(array $elements = [])
    {
        parent::__construct();

        $this->elements = $elements;
        $this->setElementsExpander(self::DEFAULT_ELEMENTS_EXPANDER);
    }

    final public function elementsSlotBuilder():array
    {
        return $this->buildElements();
    }

    protected function buildElements():array
    {
        $elements = [];

        foreach ($this->elements as $key => $value)
        {
            $elements[] = (new ArrayTreeViewItem($key, $value))
                ->setElementsPrefix($this->elementsPrefix)
                ->setKeyValueSeparator($this->keyValueSeparator)
                ->setElementsExpander($this->elementsExpander)
                ->enableExpanderOnBeginning($this->expanderOnBeginning)
                ->enableHiddenKeysMode($this->hiddenKeysMode);
        }

        return $elements;
    }
}
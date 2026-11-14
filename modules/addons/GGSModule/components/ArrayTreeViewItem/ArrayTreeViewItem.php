<?php

namespace ModulesGarden\GGSModule\Components\ArrayTreeViewItem;

use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ElementsExpanderTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ElementsPrefixTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\ExpanderOnBeginningTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\HiddenKeysModeTrait;
use ModulesGarden\GGSModule\Components\ArrayTreeView\Traits\KeyValueSeparatorTrait;
use ModulesGarden\GGSModule\Core\Components\AbstractComponent;

class ArrayTreeViewItem extends AbstractComponent
{
    use ElementsPrefixTrait;
    use KeyValueSeparatorTrait;
    use ElementsExpanderTrait;
    use ExpanderOnBeginningTrait;
    use HiddenKeysModeTrait;

    public const COMPONENT = 'ArrayTreeViewItem';

    protected mixed $value;

    public function __construct(string $key, mixed $value = null)
    {
        parent::__construct();

        $this->setSlot("name", $key);
        $this->value = $value;
    }

    final public function valueSlotBuilder():mixed
    {
        return $this->buildValue();
    }

    protected function buildValue():mixed
    {
        if (!is_array($this->value))
        {
            return $this->value;
        }

        $this->setSlot("hasElements", true);

        $elements = [];

        foreach ($this->value as $key => $value)
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
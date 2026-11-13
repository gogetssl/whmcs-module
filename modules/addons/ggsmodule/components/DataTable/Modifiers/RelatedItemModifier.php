<?php

namespace ModulesGarden\ggsmodule\Components\DataTable\Modifiers;

use ModulesGarden\ggsmodule\Core\UI\Formatters\RelatedItem\RelatedItem;

class RelatedItemModifier extends RelatedItem
{
    public function __invoke($fieldName, $row, $fieldValue, $raw)
    {
        return self::formatFromData($row);
    }
}
<?php

namespace ModulesGarden\GGSModule\Core\UI\Formatters\RelatedItem;

interface ItemTypeInterface
{
    public function generateUrl():string;
    public function generateName():string;
}
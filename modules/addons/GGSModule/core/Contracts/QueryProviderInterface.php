<?php

namespace ModulesGarden\GGSModule\Core\Contracts;

interface QueryProviderInterface extends RecordsListProviderInterface
{
    public function setQuery($query): self;
}

<?php

namespace ModulesGarden\GGSModule\Core\Contracts;

interface ArrayProviderInterface extends RecordsListProviderInterface
{
    public function setData(array $data): self;
}

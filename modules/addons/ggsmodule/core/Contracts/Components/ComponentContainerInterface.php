<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Components;

interface ComponentContainerInterface
{
    public function addElement($element): self;
}

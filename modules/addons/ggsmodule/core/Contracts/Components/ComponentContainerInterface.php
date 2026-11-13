<?php

namespace ModulesGarden\ggsmodule\Core\Contracts\Components;

interface ComponentContainerInterface
{
    public function addElement($element): self;
}

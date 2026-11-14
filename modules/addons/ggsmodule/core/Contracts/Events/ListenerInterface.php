<?php

namespace ModulesGarden\GGSModule\Core\Contracts\Events;

interface ListenerInterface
{
    public function handle($payload = []);
}

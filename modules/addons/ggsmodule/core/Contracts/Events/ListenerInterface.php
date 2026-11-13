<?php

namespace ModulesGarden\ggsmodule\Core\Contracts\Events;

interface ListenerInterface
{
    public function handle($payload = []);
}

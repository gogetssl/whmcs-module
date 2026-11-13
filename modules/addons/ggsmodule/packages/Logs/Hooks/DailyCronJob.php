<?php

$hookManager->register(
    function($args) {
        (new \ModulesGarden\ggsmodule\Packages\Logs\Services\AutoPrune())->run();
    },
    100
);

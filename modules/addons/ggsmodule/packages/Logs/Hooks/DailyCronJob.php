<?php

$hookManager->register(
    function($args) {
        (new \ModulesGarden\GGSModule\Packages\Logs\Services\AutoPrune())->run();
    },
    100
);

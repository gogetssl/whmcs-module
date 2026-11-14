<?php

namespace ModulesGarden\GGSModule\Core\UI\View;

use ModulesGarden\GGSModule\Components\Alert\Alert;
use ModulesGarden\GGSModule\Core\Services\Messages;
use function ModulesGarden\GGSModule\Core\make;

class AlertsBuilder
{
    public function create(): array
    {
        $alerts = [];
        foreach (make(Messages::class)->getAlerts() as $message)
        {
            $alerts[] = (new Alert())
                ->setText($message->getText())
                ->setType($message->getType())
                ->setOutline();
        }

        return $alerts;
    }
}
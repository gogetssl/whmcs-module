<?php

use ModulesGarden\GGSModule\Core\Components\Enums\Type;
use ModulesGarden\GGSModule\Core\DependencyInjection\Container;
use ModulesGarden\GGSModule\Packages\Logs\Enums\LogTypes;
use ModulesGarden\GGSModule\Packages\Logs\Listeners\ModuleActivated;
use ModulesGarden\GGSModule\Packages\Logs\Listeners\ModuleUpgraded;
use ModulesGarden\GGSModule\Packages\Logs\Services\Logs;
use function ModulesGarden\GGSModule\Core\listen;

return [
    'menu'        => [
        'admin'  => [
            'logs' => [
                'icon' => 'mdi mdi-clipboard-text',
            ],
        ],
        'client' => [

        ],
    ],
    'controllers' => [
        'admin'  => [
            \ModulesGarden\GGSModule\Packages\Logs\Http\Admin\Logs::class,
        ],
        'client' => [

        ],
    ],
    'packages'    => [
        'ModuleSettings'
    ],
    'config'      => [
        'colors' => [
            LogTypes::EMERGENCY => [
                'type'   => \ModulesGarden\GGSModule\Core\Components\Enums\Type::DANGER,
                'icon'   => 'alert-triangle',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ALERT     => [
                'type'   => Type::PRIMARY,
                'icon'   => 'alert-circle-o',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::CRITICAL  => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-polygon',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::ERROR     => [
                'type'   => Type::DANGER,
                'icon'   => 'alert-octagon',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonDanger::class,
            ],
            LogTypes::WARNING   => [
                'type'   => Type::WARNING,
                'icon'   => 'alert-circle',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonWarning::class,
            ],
            LogTypes::NOTICE    => [
                'type'   => Type::INFO,
                'icon'   => 'info',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonInfo::class,
            ],
            LogTypes::INFO      => [
                'type'   => Type::SUCCESS,
                'icon'   => 'information-outline',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonInfo::class,
            ],
            LogTypes::DEBUG     => [
                'type'   => Type::DEFAULT,
                'icon'   => 'bug',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonBasic::class,
            ],
            'total'             => [
                'type'   => Type::DEFAULT,
                'icon'   => 'layers',
                'button' => \ModulesGarden\GGSModule\Components\Button\ButtonBasic::class,
            ],
        ],
    ],
    'bootstrap'   => function() {
//        $oClass = new \ReflectionClass(\ModulesGarden\GGSModule\Packages\Logs\Enums\LogTypes::class);
//        foreach ($oClass->getConstants() as $type)
//        {
//            call_user_func([\ModulesGarden\GGSModule\Packages\Logs\Support\Facades\Logger::class, $type], $type. '{adawd}', ['adawd' => $type]);
//        }

        \ModulesGarden\GGSModule\Core\Hook\HookManager::create(__DIR__, true);
        Container::getInstance()->singleton(Logs::class);
        listen(\ModulesGarden\GGSModule\Core\Events\Events\ModuleActivated::class, ModuleActivated::class);
        listen(\ModulesGarden\GGSModule\Core\Events\Events\ModuleUpgraded::class, ModuleUpgraded::class);
    },
];

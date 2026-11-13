<?php

namespace ModulesGarden\ggsmodule\Core\UI\Enums;

use ModulesGarden\ggsmodule\Core\WHMCS\Enums\HostingDomainStatus;
use ModulesGarden\ggsmodule\Core\Components\Enums\Type;
use ModulesGarden\ggsmodule\Components\Button\ButtonInfo;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Button\ButtonWarning;
use ModulesGarden\ggsmodule\Components\Button\ButtonDanger;
use ModulesGarden\ggsmodule\Components\Button\ButtonBasic;

class ServiceStatusConfig
{
    public static function all():array
    {
        return [
            HostingDomainStatus::STATUS_PENDING => [
                'type'   => Type::INFO,
                'button' => ButtonInfo::class,
                'icon'   => 'hourglass-alt',
            ],
            HostingDomainStatus::STATUS_ACTIVE => [
                'type'   => Type::SUCCESS,
                'button' => ButtonSuccess::class,
                'icon'   => 'check',
            ],
            HostingDomainStatus::STATUS_SUSPENDED => [
                'type'   => Type::WARNING,
                'button' => ButtonWarning::class,
                'icon'   => 'play',
            ],
            HostingDomainStatus::STATUS_TERMINATED => [
                'type'   => Type::DANGER,
                'button' => ButtonDanger::class,
                'icon'   => 'minus-circle-outline',
            ],
            HostingDomainStatus::STATUS_CANCELLED => [
                'type'   => Type::DEFAULT,
                'button' => ButtonBasic::class,
                'icon'   => 'minus-circle-outline',
            ],
            HostingDomainStatus::STATUS_FRAUD => [
                'type'   => Type::DANGER,
                'button' => ButtonDanger::class,
                'icon'   => 'minus-circle-outline',

            ],
            HostingDomainStatus::STATUS_COMPLETED => [
                'type'   => Type::INFO,
                'button' => ButtonInfo::class,
                'icon'   => 'hourglass-alt',
            ]
        ];
    }

    public static function byStatus(string $status):array
    {
        return self::all()[$status] ?: [];
    }
}
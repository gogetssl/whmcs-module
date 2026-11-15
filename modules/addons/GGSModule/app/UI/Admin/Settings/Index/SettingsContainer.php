<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index;

use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\ApiSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\AutomatedSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\CronSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\EmailSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\FinanceSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\GeneralSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\LogsSettingsWidget;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\Sidebar;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Widgets\SslSettingsWidget;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Components\Tab\Tab;
use ModulesGarden\GGSModule\Components\TabsWidget\TabsWidget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Support\Facades\Request;

class SettingsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        // skin of the settings pages (resources/assets/css/shell.css)
        $this->setCss('ggs-settings');

        if(Request::get('settings-page') == 'apiSettings')
        {
            $mainWidget = new ApiSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'sslSettings')
        {
            $mainWidget = new SslSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'automatedSettings')
        {
            $mainWidget = new AutomatedSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'financeSettings')
        {
            $mainWidget = new FinanceSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'cronSettings')
        {
            $mainWidget = new CronSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'emailSettings')
        {
            $mainWidget = new EmailSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'logsSettings')
        {
            $mainWidget = new LogsSettingsWidget();
        }
        elseif(Request::get('settings-page') == 'generalSettings')
        {
            $mainWidget = new GeneralSettingsWidget();
        }
        else
        {
            $mainWidget = new ApiSettingsWidget();
        }

        $grid = new Grid();
        $grid->setRows(
            [
                [
                      [new Sidebar(), 2]   ,[$mainWidget,10]
                ]

            ]
        );

        $this->addElement($grid);


    }
}

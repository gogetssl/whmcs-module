<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Forms;


use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Concerns\SettingsLayout;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Providers\ApiSettingsProvider;
use ModulesGarden\GGSModule\Components\Button\ButtonPrimary;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Dropdown\Dropdown;
use ModulesGarden\GGSModule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\GGSModule\Components\Form\Form;
use ModulesGarden\GGSModule\Components\FormInputPassword\FormInputPassword;
use ModulesGarden\GGSModule\Components\FormInputText\FormInputText;
use ModulesGarden\GGSModule\Components\Grid\Grid;
use ModulesGarden\GGSModule\Components\Toolbar\Toolbar;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Components\Actions\FormSubmit;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;


class ApiSettingsForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    use SettingsLayout;

    protected $configuration;

    public function __construct($configuration = false)
    {
        parent::__construct();

        $this->configuration  = $configuration;
        $this->provider       = ApiSettingsProvider::class;
        $this->providerAction = ApiSettingsProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('SettingsForm');

        $moduleConfiguration = (new AddonModuleRepository())->getModuleConfiguration();
        // a stored token is never sent back to the page (ApiSettingsProvider::read), so its field shows a mask as the
        // placeholder: the admin sees that a token is saved, and the placeholder is not a value - an empty field is still
        // submitted empty, which Save and Test connection read as "keep the stored token"
        $stored = $moduleConfiguration['credentials'] ?? [];
        $mask   = function($vendor, $field) use ($stored) {
            $input = (new FormInputPassword())->setName($field === 'TestAuthToken' ? $vendor . 'TestAuthToken' : $vendor . 'LiveAuthToken');
            if(trim((string)($stored[$vendor][$field] ?? '')) !== '')
            {
                $input->setPlaceholder('************');
            }

            return $input;
        };

        foreach($moduleConfiguration['vendors'] as $vendor)
        {
            $widget = $this->section($vendor, 'key-outline');

            $this->builder->addFieldInContainer($widget, (new FormInputText())->setName($vendor . 'LivePartnerCode'));
            $this->builder->addFieldInContainer($widget, $mask($vendor, 'AuthToken'));

            if($vendor == 'tss')
            {
                $this->builder->addFieldInContainer($widget, (new FormInputText())->setName($vendor . 'TestPartnerCode'));
                $this->builder->addFieldInContainer($widget, $mask($vendor, 'TestAuthToken'));
                $this->builder->addFieldInContainer($widget, (new Dropdown())->setName('OperationMode')->setOptions(['live' => 'Live', 'sandbox' => 'Sandbox'])->setDefaultValueAsFirstOption());
            }
        }

        // Saving tests the connection first and the credentials may be prefilled from the legacy modules (not stored yet),
        // so Save stays enabled on this screen
        $this->saveBar(
            $this->configuration === true ? $this->translate('next_step') : null,
            true,
            [
                (new ButtonPrimary())
                    ->setId('buttonTestConnection')
                    ->setTitle($this->translate('testConnection'))
                    ->onClick((new FormSubmit($this))->setCustomAction(ApiSettingsProvider::ACTION_TEST_CONNECTION)),
            ]
        );
    }
}

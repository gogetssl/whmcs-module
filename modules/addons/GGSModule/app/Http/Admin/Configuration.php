<?php

namespace ModulesGarden\GGSModule\App\Http\Admin;

use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep1;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep2;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep3;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep4;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep5;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep6;
use ModulesGarden\GGSModule\App\Libs\Edition;
use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Http\AbstractController;
use ModulesGarden\GGSModule\Core\Helper;

class Configuration extends AbstractController implements AdminAreaInterface
{
    public function index()
    {
        return Helper\redirect('configuration', 'step1');
    }

    public function step1()
    {
        return Helper\view()
            ->addElement(ConfigurationStep1::class);
    }

    public function step2()
    {
        return Helper\view()
            ->addElement(ConfigurationStep2::class);
    }
    /**
     * Legacy modules found. Without one the wizard has no such step: the vendor is fixed by the edition.
     */
    public function step3()
    {
        if(!WizardLayout::hasLegacy())
        {
            (new AddonModuleRepository())->saveVendor([Edition::get()]);

            return Helper\redirect('configuration', 'step4');
        }

        return Helper\view()
            ->addElement(ConfigurationStep3::class);
    }


    public function step4()
    {
        return Helper\view()
            ->addElement(ConfigurationStep4::class);
    }

    public function step5()
    {
        return Helper\view()
            ->addElement(ConfigurationStep5::class);
    }

    public function step6()
    {
        return Helper\view()
            ->addElement(ConfigurationStep6::class);
    }

    /** The migration of the legacy module (only when it was chosen in step 3) */
    public function step7()
    {
        if(!WizardLayout::migrationPlanned())
        {
            return Helper\redirect('configuration', 'step6');
        }

        return Helper\view()
            ->addElement(\ModulesGarden\GGSModule\App\UI\Admin\Configuration\Pages\ConfigurationStep7::class);
    }


}

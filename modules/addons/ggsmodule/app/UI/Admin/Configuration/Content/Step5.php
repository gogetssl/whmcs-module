<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Content;

use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Translation\TranslatorTrait;
use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\ArrayDataProvider\DataTable;

class Step5 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        \ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 5, $this->translate('step5_title'));

        $alert = new AlertInfo();
        $alert->setText($this->translate("productsInfo"));
        $this->addElement($alert);

        $this->addElement(new DataTable());

        $nextStep = new ButtonSuccess();
        $nextStep->setCss('lu-btn lu-btn--success mt30_custom');
        $nextStep->onClick(Action::redirect('addonmodules.php?module=GGSModule&mg-page=configuration&mg-action=step6'));
        $nextStep->setTitle($this->translate('next_step_btn'));
        $this->addElement($nextStep);
    }
}
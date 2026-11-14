<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Content;

use ModulesGarden\GGSModule\App\Migration\Credentials;
use ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Translation\TranslatorTrait;

class Step4 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        WizardLayout::prepareStep($this, 4, $this->translate('step4_title'));

        [, $filled] = Credentials::prefilled();
        if($filled)
        {
            $names = array_map(function($s) { return $s === 'ggs' ? 'GoGetSSL' : 'TheSSLStore'; }, $filled);
            $note  = new Text();
            $note->setCss('ggs-html');
            $note->setText('<div class="ggs-note is-ok">' . htmlspecialchars($this->translate('credentials_prefilled', ['modules' => implode(', ', $names)])) . '</div>');
            $this->addElement($note);
        }

        $this->addElement(new ApiSettingsForm(true));

    }
}
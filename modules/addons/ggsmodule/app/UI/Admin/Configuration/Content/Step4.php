<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\ggsmodule\App\Migration\Credentials;
use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\ggsmodule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Core\Translation\TranslatorTrait;

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
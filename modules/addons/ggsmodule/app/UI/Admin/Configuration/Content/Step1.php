<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Configuration\Content;

use ModulesGarden\GGSModule\Components\Button\ButtonSuccess;
use ModulesGarden\GGSModule\Components\Row\Row;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Components\Widget\Widget;
use ModulesGarden\GGSModule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\GGSModule\Core\Components\Action;
use ModulesGarden\GGSModule\Core\Translation\TranslatorTrait;

class Step1 extends Widget implements AjaxComponentInterface
{

    use TranslatorTrait;

    public function loadHtml(): void
    {
        \ModulesGarden\GGSModule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 1, $this->translate('step1_title'));

        $text = new Text();
        $text->setText($this->translate('first_p', ['moduleName' => \ModulesGarden\GGSModule\App\Libs\Edition::name()]).'<br><br>');
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $text = new Text();
        $text->setText($this->translate('second_p').'<br><br>');
        $this->addElement($text);

        $features = '';
        foreach([1, 2, 3] as $i)
        {
            $features .= '<div class="ggs-feature"><div class="ggs-feature__title">' . htmlspecialchars($this->translate('feature' . $i . '_title')) . '</div>'
                . '<div class="ggs-feature__desc">' . htmlspecialchars($this->translate('feature' . $i . '_desc')) . '</div></div>';
        }
        $text = new Text();
        $text->setCss('ggs-html');
        $text->setText('<div class="ggs-features">' . $features . '</div>');
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $text = new Text();
        $text->setText($this->translate('third_p'));
        $this->addElement($text);

        $row = new Row();
        $this->addElement($row);

        $nextStep = new ButtonSuccess();
        $nextStep->setCss('lu-btn lu-btn--success mt30_custom');
        $nextStep->onClick(Action::redirect('addonmodules.php?module=GGSModule&mg-page=configuration&mg-action=step2'));
        $nextStep->setTitle($this->translate('next_step_btn'));
        $this->addElement($nextStep);


    }
}
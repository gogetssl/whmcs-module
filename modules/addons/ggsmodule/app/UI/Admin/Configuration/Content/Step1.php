<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\ggsmodule\Components\Button\ButtonSuccess;
use ModulesGarden\ggsmodule\Components\Row\Row;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Components\Action;
use ModulesGarden\ggsmodule\Core\Translation\TranslatorTrait;

class Step1 extends Widget implements AjaxComponentInterface
{

    use TranslatorTrait;

    public function loadHtml(): void
    {
        \ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\WizardLayout::prepareStep($this, 1, $this->translate('step1_title'));

        $text = new Text();
        $text->setText($this->translate('first_p', ['moduleName' => \ModulesGarden\ggsmodule\App\Libs\Edition::name()]).'<br><br>');
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
        $nextStep->onClick(Action::redirect('addonmodules.php?module=ggsmodule&mg-page=configuration&mg-action=step2'));
        $nextStep->setTitle($this->translate('next_step_btn'));
        $this->addElement($nextStep);


    }
}
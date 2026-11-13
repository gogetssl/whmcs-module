<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Content;

use ModulesGarden\ggsmodule\App\Migration\Detector;
use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\Forms\LegacyChoiceForm;
use ModulesGarden\ggsmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\ggsmodule\Components\Text\Text;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\ggsmodule\Core\Translation\TranslatorTrait;

/**
 * Wizard step "Legacy modules found": what was detected and, per module, the decision Migrate / Install standalone.
 * The migration itself runs after the API connection and product steps (page "migration").
 */
class Step3 extends Widget implements AjaxComponentInterface
{
    use TranslatorTrait;

    public function loadHtml(): void
    {
        WizardLayout::prepareStep($this, 3, $this->translate('step3_title'));

        $found = Detector::detect();
        // name only what was actually found: "GoGetSSL", "TheSSLStore" or both
        $names = array_map(function($info) { return $info['source'] === 'ggs' ? 'GoGetSSL' : 'TheSSLStore'; }, $found);
        $intro = $this->translate(count($names) > 1 ? 'intro_many' : 'intro_one', ['modules' => implode(' ' . $this->translate('and') . ' ', $names)]);
        $html  = '<p class="ggs-checks__intro">' . htmlspecialchars($intro) . '</p>';

        foreach($found as $source => $info)
        {
            $c    = $info['counts'];
            $band = $info['support']['band'];

            $html .= '<div class="ggs-legacy">'
                . '<div class="ggs-legacy__head"><b>' . htmlspecialchars($info['label']) . '</b> <span class="ggs-muted">' . htmlspecialchars($info['version'] ?: $this->translate('version_unknown')) . '</span>'
                . ' <span class="ggs-checks__status is-' . ($band === 'full' ? 'passed' : ($band === 'partial' ? 'warning' : 'failed')) . '">' . htmlspecialchars($this->translate('support_' . $band)) . '</span></div>'
                . '<ul class="ggs-legacy__facts">'
                . '<li>' . htmlspecialchars($this->translate('fact_products', ['n' => (int)$c['products']['total']])) . '</li>'
                . '<li>' . htmlspecialchars($this->translate('fact_services', ['active' => (int)($c['services']['Active'] ?? 0), 'total' => array_sum($c['services'])])) . '</li>'
                . '<li>' . htmlspecialchars($this->translate('fact_orders', ['n' => array_sum($c['orders']), 'unconfigured' => (int)$c['unconfigured'], 'unpaid' => (int)$c['unpaid']])) . '</li>'
                . '<li>' . htmlspecialchars($this->translate('fact_subscriptions', ['acme' => (int)$c['acme'], 'ais' => (int)$c['ais'], 'autoinstall' => (int)$c['autoinstall']])) . '</li>'
                . '</ul>';
            if($info['support']['reason'])
            {
                $html .= '<p class="ggs-muted">' . htmlspecialchars($info['support']['reason']) . '</p>';
            }
            if(!$info['support']['supported'])
            {
                $html .= '<div class="ggs-note is-bad">' . htmlspecialchars($this->translate('unsupported_hint')) . '</div>';
            }
            $html .= '</div>';
        }
        $html .= '<p class="ggs-muted">' . htmlspecialchars($this->translate('runs_later')) . '</p>';

        $text = new Text();
        $text->setCss('ggs-html');
        $text->setText($html);
        $this->addElement($text);

        $this->addElement(new LegacyChoiceForm());
    }
}
